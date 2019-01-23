<?php

namespace App\Modules\Physician\Models;

use Illuminate\Database\Eloquent\Model;

class AdminStaff extends Model {

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function userPermissions()
    {
        return $this->belongsToMany('App\Modules\Physician\Models\UserPermissions','user_id');
    }    
}