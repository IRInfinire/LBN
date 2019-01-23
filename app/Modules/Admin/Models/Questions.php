<?php namespace App\Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'questions';

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
//    public $timestamps  = false;
    protected $fillable = array('user_id', 'title', 'description', 'visibility', 'steps_completed');
 
}
