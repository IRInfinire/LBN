<?php

namespace App\Modules\Patient\Repositories;

use App\Modules\Patient\Models\Medications;
use Illuminate\Support\Facades\Auth;

class MedicationsRepository extends BaseRepository {

    /**
     * The Role instance.
     *
     * @var \App\Models\Role
     */
    public function __construct() {
        $this->medications = new Medications();
    }

    /**
     * Get the list of allergies added by patients.
     *
     * @return Response
     */
    public function getMedicationsList($patientId = 0) {
        if ($patientId > 0)
            $query = $this->medications->where('patient_id', '=', $patientId)->orderBy('id', 'desc')->get();
        else
            $query = $this->medications->get();
        return $query;
    }

    /**
     * Get the list of allergies added by patients.
     *
     * @return Response
     */
    public function createMedications($data) {
        $medicationData['patient_id'] = Auth::guard('patient')->id();
        $medicationData['type'] = $data['type'];
        $medicationData['description'] = $data['description'];
        $query = $this->medications->insert($medicationData);
        return true;
    }

    /**
     * Get the list of allergies added by patients.
     *
     * @return Response
     */
    public function updateMedications($data, $medicationId) {
        $medicationData['type'] = $data['type'];
        $medicationData['description'] = $data['description'];
        $query = $this->medications->where('id', $medicationId)->update($medicationData);
        return true;
    }

    /**
     * Get the list of allergies added by patients.
     *
     * @return Response
     */
    public function deleteMedications($medicationId) {
        $query = $this->medications->where('id', $medicationId)->delete();
        return true;
    }

    /**
     * Get the list of allergies added by patients.
     *
     * @return Response
     */
    public function getMedicationsById($id) {
        return $this->medications->where('id', $id)->first();
    }

}
