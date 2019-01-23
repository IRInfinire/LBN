<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model {
    use SoftDeletes;
     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = 'plans';

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
    /**
     * Relation with Subscription.
     *
     * 
     */
    public function subscriptions()
    {
        return $this->belongsToMany('App\Models\Subscription', 'stripe_idff');
    } 

}
