<?php
namespace App\Modules\Physician\Models;

use Illuminate\Database\Eloquent\Model;

class PermissionUser extends Model {

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'permission_user';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = []; 

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
    
    /**
     * Relations.
     *
     * @var bool
     */
    public function users()
    {
        return $this->belongsToMany('App\Modules\Physician\Models\Permissions', 'permission_user','permission_id', 'user_id');
    } 


}