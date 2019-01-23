<?php namespace App\Modules\Patient\Repositories;

use App\Modules\Patient\Models\Patient;

class PatientRepository extends BaseRepository
{

    /**
     * The Role instance.
     *
     * @var \App\Models\Role
     */
    public function __construct()
    {
        $this->patient = new Patient();
    }

    /**
     * update  Question flags.
     *
     * @return \Illuminate\Support\Collection
     */
    public function updateUserProfile($userId, $inputData)
    {
        return $this->patient->where('id', $userId)->update($inputData);
    }
}
