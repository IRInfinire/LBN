<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionNarrativeOutput extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'question_narrative_output';

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
    public $timestamps  = true;
    protected $fillable = array('question_id', 'narrative_output', 'active');
 
}
