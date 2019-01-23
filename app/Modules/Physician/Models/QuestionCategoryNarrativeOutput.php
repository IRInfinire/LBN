<?php namespace App\Modules\Physician\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionCategoryNarrativeOutput extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'question_category_narrative_output';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
//    protected $guarded = [ 'created_at', 'updated_at'];
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
}
