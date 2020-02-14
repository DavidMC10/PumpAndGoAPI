<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    /**
     * The primary key of the table.
     *
     * @var
     */
    protected $primaryKey = 'transaction_id';

    /**
     * The table name.
     *
     * @var
     */
    protected $table = 'transaction';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'transaction_date_time', 'number_of_litres', 'pump_number', 'fuel_discount_entitlement', 'payment_method'
    ];
}
