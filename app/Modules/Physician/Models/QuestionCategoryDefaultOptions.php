<?php

namespace App\Modules\Physician\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionCategoryDefaultOptions extends Model {

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'question_category_default_options';

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
    public $timestamps = true;

}
