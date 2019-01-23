<?php

namespace App\Modules\Physician\Models;

use Illuminate\Database\Eloquent\Model;

class SummaryReports extends Model {

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'manage_reports';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = []; 
}
