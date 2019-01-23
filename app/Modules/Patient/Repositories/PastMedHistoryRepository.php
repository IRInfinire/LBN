<?php namespace App\Modules\Patient\Repositories;

use App\Modules\Patient\Models\PastMedHistory;
use Illuminate\Support\Facades\Auth;

class PastMedHistoryRepository extends BaseRepository
{

    /**
     * The Role instance.
     *
     * @var \App\Models\Role
     */
    public function __construct()
    {
        $this->pastMedHistory = new PastMedHistory();
    }

    /**
     * Get the list of allergies added by patients.
     *
     * @return Response
     */
    public function getPastMedHistoryList($patientId = 0)
    {
        if ($patientId > 0)
            $query = $this->pastMedHistory->where('patient_id', '=', $patientId)->orderBy('id', 'desc')->get();
        else
            $query = $this->pastMedHistory->get();
        return $query;
    }

    /**
     * create medical history added by patients.
     *
     * @return Response
     */
    public function createMedicalHistory($data)
    {
        $medHistoryData['patient_id']  = Auth::guard('patient')->id();
        $medHistoryData['type']        = $data['type'];
        $medHistoryData['description'] = $data['description'];
        $query                         = $this->pastMedHistory->insert($medHistoryData);
        return true;
    }

    /**
     * update medical history added by patients.
     *
     * @return Response
     */
    public function updateMedicalHistory($data, $medHistoryId)
    {
        $medHistoryData['type']        = $data['type'];
        $medHistoryData['description'] = $data['description'];
        $query                         = $this->pastMedHistory->where('id', $medHistoryId)->update($medHistoryData);
        return true;
    }

    /**
     * Get the list of allergies added by patients.
     *
     * @return Response
     */
    public function deletePastMedHistory($medHistoryId)
    {
        $query = $this->pastMedHistory->where('id', $medHistoryId)->delete();
        return true;
    }

    /**
     * Get the list of allergies added by patients.
     *
     * @return Response
     */
    public function getMedHistoryById($id)
    {
        return $this->pastMedHistory->where('id', $id)->first();
    }
}
