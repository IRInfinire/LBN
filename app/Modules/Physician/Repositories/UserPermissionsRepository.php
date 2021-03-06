<?php namespace App\Modules\Physician\Repositories;

use App\Modules\Physician\Models\UserPermissions;

class UserPermissionsRepository extends BaseRepository
{

    protected $model;
    /**
     * The User Menu Permissions instance.
     *
     * @var \App\Models\UserMenuPermissions
     */
    public function __construct()
    {
        $this->model = new UserPermissions();
    }
    /**
     * The Create Permissions
     *
     * @var \App\Models\UserPermissions
     */
    public function create($data)
    {
        $this->model->create($data);
    }
    /**
     * The Create Permissions
     *
     * @var \App\Models\UserPermissions
     */
    public function insert($data)
    {
        $this->model->insert($data);
    } 
    public function get()
    {
        return $this->model;
    }  
}