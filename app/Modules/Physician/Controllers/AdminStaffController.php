<?php
namespace App\Modules\Physician\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Physician\Models\Permissions;
use App\Modules\Physician\Models\Menus;
use App\User;
// use Auth
use Illuminate\Support\Facades\Auth;
// use DB
use Illuminate\Support\Facades\DB;
// Repository
use App\Modules\Physician\Repositories\AdminStaffRepository;
use App\Modules\Physician\Repositories\PermissionUserRepository;
// Requests 
use App\Modules\Physician\Requests\AdminStaffCreateRequest;
use App\Modules\Physician\Requests\AdminStaffUpdateRequest;
use Yajra\Datatables\Facades\Datatables;
// Mail Sending
use Mail;
use App\Mail\AdminStaff;
use Illuminate\Notifications\Notifiable;
use App\Notifications\StaffNotify;

class AdminStaffController extends Controller {

    use Notifiable;

    /**
     * initilaize the constructure
     * @param  none
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        
    }

    /**
     * Listing of Admin Staff 
     * @param none
     * @return HTML
     */
    public function index() {   
       
        if (!(Auth::user()->isAuthorizedStaff('admin_staff_list')))
            return redirect()->back()->with('error', trans('Physician::messages.permission_error'));  

        return view("Physician::adminStaff.list");
    }

    /**
     * Ajax content for Listing 
     * @param $request
     * @param string $search
     * @return JSON Response
     */
    public function getList(Request $request, AdminStaffRepository $adminstaffrepo) {
       
        $user_id = Auth::user()->getUserId();
        $adminStaffs = $adminstaffrepo->all($user_id);
        return Datatables::of($adminStaffs)
                        ->add_column('', function($adminStaffs) {
                            $actionLinks = "";
                            if (Auth::user()->isAuthorizedStaff('admin_staff_edit'))
                                $actionLinks .= '<a href="' . route('physician.adminstaff.edit', $adminStaffs->id) . '" class="edit not-done" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil-square-o" ></i></a>';
                            if (Auth::user()->isAuthorizedStaff('admin_staff_delete'))
                                $actionLinks .= ' <a href="' . route('physician.adminstaff.delete', $adminStaffs->id) . '" data-id="' . $adminStaffs->id . '" class="edit mrgn-lft-25 not-done" data-toggle="tooltip" data-placement="top" title="Delete" onClick="return confirm(\'' . sprintf(trans('Physician::messages.delete_confirm'), 'Staff') . '\')"><i class="fa fa-trash-o" ></i></a>';
                            return $actionLinks;                         
                        })
                        ->filter(function ($instance) use ($request) {
                            if ($request->has('search')) {
                                $searchText = $request->get('search');
                                $instance->where(function ($query) use ($searchText) {
                                    $query->orWhere('name', 'like', "%{$searchText}%")
                                    ->orWhere('email', 'like', "%{$searchText}%");
                                });
                            }
                        })
                        ->make(true);
    }

    /**
     * To Create New Administrator Staff   
     * @return HTML
     */
    public function getNew() {
        $menus = Menus::with('permissions')->get()->toArray();
        return view("Physician::adminStaff.create", compact('menus'));
    }

    /**
     * To Update New Administrator Staff
     * @param request AdminStaffCreateRequest
     * @param String $name, $email, $password 
     * @param Array $menu
     * @param Repository AdminStaffRepository
     * @return Response
     */
    public function postCreate(AdminStaffCreateRequest $request, AdminStaffRepository $adminstaffrepo) {

        $user_id = Auth::user()->id;
        $data = $request->all();
        $menuroles = $data['permission'];
        $data['parent_id'] = $user_id;
        $data['is_account_active'] = 'Y';
        unset($data['permission']);
        unset($data['menu']);
        $adminStaff = $adminstaffrepo->save($data);
        if ($adminStaff) {
            $menuroles = array_keys($menuroles);
            foreach ($menuroles as $menuVal) {
                $permissions[] = ['permission_id' => $menuVal, 'user_id' => $adminStaff->id];
            }
            $adminstaffrepo->get()->permissions()->sync($permissions);
            $data['narrativetext'] = trans("Physician::messages.email_adminstaff_add_text");
            $data['action'] = 'CREATE';
            $adminStaff->notify(new StaffNotify($data));
        }
        \Session::flash('success', sprintf(trans('Physician::messages.success_reg'), 'Staff'));
        return json_encode(array('success' => true, 'message' => sprintf(trans('Physician::messages.success_reg'), 'Staff'), 'redirectUrl' => route('physician.adminstaff.index')));
    }

    /**
     * To Edit Administrator Staff
     * 
     * @return HTML
     */
    public function getEdit(Request $request, AdminStaffRepository $adminstaffrepo, PermissionUserRepository $permissionUserRepo) {
        
        $user_id = $request->user_id;   
        if (!(Auth::user()->isAuthorizedStaff('admin_staff_edit')))
            return redirect()->back()->with('error', trans('Physician::messages.permission_error'));  

        $authUser = Auth::user()->getUserId();
        $adminStaff = $adminstaffrepo->get()->AdminStaff()->with('permissions')->where('id', $user_id)->get()->toArray();
        $adminStaff = end($adminStaff);
        if (($authUser != $adminStaff['parent_id']) || empty($adminStaff))
            return redirect()->back()->with('error', trans('Physician::messages.unauthorized'));

        $menus = Menus::with('permissions')->get()->toArray();
        $menuIds = array_pluck($adminStaff['permissions'], 'menu_id');
        $staffPermissions = array_pluck($adminStaff['permissions'], 'id');
        return view("Physician::adminStaff.edit", compact('menus', 'adminStaff', 'staffPermissions', 'menuIds'));
    }

    /**
     * To Update Administrator Staff   
     * @param request AdminStaffUpdateRequest
     * @param String $name, $email, $password 
     * @param Array $menu
     * @param Repository AdminStaffRepository       
     * @return Response
     */
    public function postUpdate(AdminStaffUpdateRequest $request) {

        $user = User::find($request->id);        
        $user->name = $request->name;
        $user->email = $request->email;
        $currentPwd = $user->password;
        if (isset($request->password) && $request->password != "") {
            $user->password = \Hash::make($request->password);
        }
        $user->save();
        $adminStaffPermissions = array_keys($request['permission']);
        $user->permissions()->sync($adminStaffPermissions);
        \Session::flash('success', sprintf(trans('Physician::messages.success_update'), 'Staff'));
        if (isset($request->password) && $request->password != "") {
            if (!(\Hash::check($request->password, $currentPwd))) {
                $data = $request->all();
                $data['narrativetext'] = trans("Physician::messages.email_adminstaff_edit_text");
                $data['action'] = 'UPDATE';
                $user->notify(new StaffNotify($data));
            }
        }       
        return json_encode(array('success' => true, 'message' => sprintf(trans('Physician::messages.success_update'), 'Staff'), 'redirectUrl' => route('physician.adminstaff.index')));
    }
    /**
     * To Delete Administrator Staff
     * @param Integer $user_id 
     * @param Repository PermissionUserRepository  
     * @return Response
     */
    public function getDelete(Request $request, PermissionUserRepository $permissionUserRepo) {       

        if (!(Auth::user()->isAuthorizedStaff('admin_staff_delete')))
            return redirect()->back()->with('error', trans('Physician::messages.permission_error'));  
        
        $authUser = Auth::user()->getUserId();
        
        $adminStaff = User::AdminStaff()->where('id', $request->user_id)->first();

        if (($authUser != $adminStaff['parent_id']) || empty($adminStaff))
            return redirect()->back()->with('error', trans('Physician::messages.permission_error'));

        // To delete all Permissions
        $permissionUserRepo->get()->where('user_id', $request->user_id)->delete();
        // To delete User       
        $adminStaff->delete();
        return redirect()->back()->with('success', sprintf(trans('Physician::messages.success_delete'), 'Staff'));
    }
}