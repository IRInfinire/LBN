<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model {

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'subscriptions';

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
     * Relation with Plans.
     *
     * 
     */
    public function plan()
    {
        return $this->belongsTo('App\Models\Plan', 'stripe_plan','plan_id');
    } 

}
