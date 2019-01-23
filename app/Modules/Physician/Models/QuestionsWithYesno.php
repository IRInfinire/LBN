<?php namespace App\Modules\Physician\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionsWithYesno extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'questions_with_yesno';

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
//    public $timestamps = tr;
 
}
