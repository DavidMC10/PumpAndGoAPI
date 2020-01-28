<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transactionDateTime', 'numberOfLitres', 'pumpNumber', 'fuelDiscountEntitlement', 'paymentMethod'
    ];

}
