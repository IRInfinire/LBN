<?php namespace App\Modules\Admin\Repositories;

use App\Modules\Admin\Models\Admins;

class AdminsRepository extends BaseRepository
{

    /**
     * The Role instance.
     *
     * @var \App\Models\Role
     */
    public function __construct()
    {
        $this->admins = new Admins();
    }

    /**
     * update  Question flags.
     *
     * @return \Illuminate\Support\Collection
     */
    public function updateUserProfile($userId, $inputData)
    {
        return $this->admins->where('id', $userId)->update($inputData);
    }
}
