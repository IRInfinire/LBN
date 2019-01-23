<?php namespace App\Modules\Patient\Repositories;

use App\Models\QuestionReceipients;

class QuestionReceipientRepository extends BaseRepository
{

    public $model;
    /**
     * The Role instance.
     *
     * @var \App\Models\Role
     */
    public function __construct()
    {
        $this->model = new QuestionReceipients();
    }
    /**
     * The Get All Questions With Details.
     *
     * @var \App\Models\Role
     */
    public function getQuestions()
    {
        return $this->model;
    }
}