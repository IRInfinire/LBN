<?php namespace App\Modules\Physician\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionsCategory extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'question_categories';

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
    public $timestamps  = false;
//    protected $fillable = array('user_id', 'question_id', 'category_id', 'question', 'answer_method', 'narrative_output', 'clinical_question', 'quest_status','active');
//
    public function category()
    {
        return $this->belongsTo('App\Modules\Physician\Models\Category', 'category_id');
    }
    
   
}
