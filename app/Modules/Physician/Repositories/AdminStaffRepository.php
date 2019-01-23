<?php namespace App\Modules\Physician\Repositories;

use App\User;

class AdminStaffRepository extends BaseRepository
{

    protected $model;
    /**
     * The Role instance.
     *
     * @var \App\Models\Role
     */
    public function __construct()
    {
        $this->model = new User();
    }

    /**
     * Get all Admin Staffs.
     *
     * @return \Illuminate\Support\Collection
     */
    public function all($userId)
    {       
        $query = $this->model->where('parent_id', $userId)->where('user_role', 'S');
        if(\Auth::user()->user_role == 'S') // exclude this user from listing
            $query->where('id','!=', \Auth::user()->id);            
        return $query;
    }

    /**
     * Save Administrative Staff.
     *
     * @return \Illuminate\Support\Collection
     */
    public function save($inputData)
    {
        $inputData['password']  = bcrypt($inputData['password']);
        $inputData['user_role'] = 'S';
        $result                 = $this->model->create($inputData);
        return $result;
    }
    /**
     * Update Administrative Staff.
     *
     * @return \Illuminate\Support\Collection
     */
    public function update($inputData)
    {
       $result               = $this->model->where('id', $inputData['id'])->update($inputData);
       return $result;
    }
    /**
     * Get Administrative Staff.
     *
     * @return \Illuminate\Support\Collection
     */
    public function get()
    {       
       return $this->model;
    }   
}