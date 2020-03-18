<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;


    /**
     * The table name.
     *
     * @var
     */
    protected $table = 'user';

    /**
     * The primary key of the table.
     *
     * @var
     */
    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'stripe_customer_id', 'first_name', 'last_name', 'email', 'password', 'max_fuel_limit', 'max_distance_limit', 'default_payment_method', 'reward_card_id', 'fuel_card_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    // /**
    //  * The attributes that should be cast to native types.
    //  *
    //  * @var array
    //  */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    /**
     * Get the rewards that own the user.
     */
    public function reward()
    {
        return $this->belongsTo('App\Reward', 'reward_card_id');
    }

    /**
     * Get fuel cards that own the user.
     */
    public function fuelCard()
    {
        return $this->belongsTo('App\FuelCard', 'fuel_card_id');
    }

    /**
     * Get the users who have transactions.
     */
    public function transaction()
    {
        return $this->hasMany('App\Transaction', 'user_id');
    }

    /**
     * Override the mail body for reset password notification mail.
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new \App\Notifications\MailResetPasswordNotification($token));
    }
}
