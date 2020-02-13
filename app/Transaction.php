<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    /**
     * The table name.
     *
     * @var
     */
    protected $table = 'fuel_card';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transaction_date_time', 'number_of_litres', 'pump_number', 'fuel_discount_entitlement', 'payment_method'
    ];
}
