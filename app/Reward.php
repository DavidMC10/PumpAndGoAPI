<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{

    /**
     * The table name.
     *
     * @var
     */
    protected $table = 'reward';

    /**
     * The primary key of the table.
     *
     * @var
     */
    protected $primaryKey = 'reward_card_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'barcode_number', 'car_wash_discount_percentage', 'fuel_discount_percentage', 'deli_discount_percentage', 'coffee_discount_percentage'
    ];

    /**
     * Get the users who have Rewards.
     */
    public function user()
    {
        return $this->hasMany('App\User', 'reward_card_id');
    }
}
