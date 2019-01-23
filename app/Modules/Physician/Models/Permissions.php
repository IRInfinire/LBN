<?php

namespace App\Modules\Physician\Models;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model {

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'permissions';

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
     * The User that belong to the Permission.
     */
    public function users()
    {
        return $this->belongsToMany('App\User','permission_user','permission_id','user_id');
    } 
    /**
     * The Permission Menu.
    */
    public function menu()
    {
        return $this->belongsTo('App\Modules\Physician\Models\Menu');
    }     
}