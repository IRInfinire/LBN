<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\MyResetPassword;
use Laravel\Cashier\Billable;

class User extends Authenticatable {

    use Notifiable;
    use Billable;
    protected $dates = ['trial_ends_at','subscription_ends_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = [
//        'name', 'email', 'password', 'speciality', 'hospital_name', 'npi_number', 'city', 'contact_number', 'user_role',
//    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Set the verified status to true and make the email token null
    public function verified() 
    {
        $this->is_account_active = 'Y';
        $this->activation_code = null;
        $this->save();
    }

    /**
     * Check if the User Is Admin Staff
     *
     * @var array
     */
    public function scopeAdminStaff($query) 
    {

        return $query->whereuser_role('S');
    }

    /**
     * Check If the User Have the Permission 
     *
     * @var array
     */
    public function hasPermission($permission) 
    {
        return $this->permissions()->where('permission', $permission)->first();
    }

    /**
     * The permission that belong to the user.
     */
    public function permissions() {
        return $this->belongsToMany('App\Modules\Physician\Models\Permissions', 'permission_user', 'user_id', 'permission_id');
    }
    /**
     * Check if the User Is Patient
     *
     * @var array
     */    
    public function scopePhysician($query)
    {
        return $query->whereuser_role('D');
    }
    /**
     * Relation with Question
     *
     * @var array
     */    
    public function questions()
    {
        return $this->hasMany('App\Models\Questions','user_id');
    }
    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token) {
        $this->notify(new MyResetPassword($token));
    }    
    /**
     * Get the currently active subscription.
     *
     * @param  string  $token
     * @return void
     */
    public function activeSubscription() 
    {
        return $this->hasOne('App\Models\Subscription', 'user_id')->where('status', 'active');
    }
    /**
     * To check whether the user is subscripbed for any plan.
     *
     * @param  string  $token
     * @return void
     */
    public function isSubscribed() 
    {
        $subscription = $this->subscriptions->sortByDesc(function ($value) {
            return $value->created_at->getTimestamp();
        })
        ->first(function ($value) {
            return $value->status === 'active';
        });        
        if (is_null($subscription)) {
            return false;
        }
        return $subscription->valid();
    }
    /**
     * To check whether the user is Staff.
     *
     * @param  string  $token
     * @return void
     */
    public function isAuthorizedStaff($permission) 
    {    
        
        if ('S' == $this->user_role && !($this->hasPermission($permission))) {            
            return false;
        }
        else {            
            return true;
        }
    }
    /**
     * To get the user id if the user is admin Staff
     *
     * @param  string  $token
     * @return void
     */
    public function getUserId() 
    {        
        return ('S' == $this->user_role) ? $this->parent_id : $this->id;
        
    }
    /**
     * To get the user id if the user is admin Staff
     *
     * @param  string  $token
     * @return void
     */
    public function isParentIsSubscribed() 
    {        
        $subscribed = false;
        if($this->user_role == 'S') {
            $activeSubscription = \App\Models\Subscription::where('user_id',$this->parent_id)->where('status','active')->first();
            if($activeSubscription)
                $subscribed = true;                     
        }   
        return $subscribed;   
    }
}