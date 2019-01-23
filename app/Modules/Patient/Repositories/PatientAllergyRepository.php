<?php namespace App\Modules\Patient\Repositories;

use App\Modules\Patient\Models\PatientAllergy;
use Illuminate\Support\Facades\Auth;

class PatientAllergyRepository extends BaseRepository
{

    /**
     * The Role instance.
     *
     * @var \App\Models\Role
     */
    public function __construct()
    {
        $this->patientAllergy = new PatientAllergy();
    }

    /**
     * Get the list of allergies added by patients.
     *
     * @return Response
     */
    public function getAllergyList($patientId = 0)
    {
        if ($patientId > 0)
            $query = $this->patientAllergy->where('patient_id', '=', $patientId)->orderBy('id', 'desc')->get();
        else
            $query = $this->patientAllergy->get();
        return $query;
    }

    /**
     * Get the list of allergies added by patients.
     *
     * @return Response
     */
    public function createPatientAllergy($data)
    {
        $allergyData['patient_id']  = Auth::guard('patient')->id();
        $allergyData['type']        = $data['type'];
        $allergyData['description'] = $data['description'];
        $query                      = $this->patientAllergy->insert($allergyData);
        return true;
    }

    /**
     * Get the list of allergies added by patients.
     *
     * @return Response
     */
    public function updatePatientAllergy($data, $allergyId)
    {
        $allergyData['type']        = $data['type'];
        $allergyData['description'] = $data['description'];
        $query                      = $this->patientAllergy->where('id', $allergyId)->update($allergyData);
        return true;
    }

    /**
     * Get the list of allergies added by patients.
     *
     * @return Response
     */
    public function deletePatientAllergy($allergyId)
    {
        $query = $this->patientAllergy->where('id', $allergyId)->delete();
        return true;
    }

    /**
     * Get the list of allergies added by patients.
     *
     * @return Response
     */
    public function getAllergyById($id)
    {
        return $this->patientAllergy->where('id', $id)->first();
    }
}
