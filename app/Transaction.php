<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Created by David McElhinney on 14/03/2020.
 */
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
       'user_id', 'fuel_station_id', 'fuel_type_id', 'transaction_date_time', 'number_of_litres', 'pump_number', 'fuel_discount_entitlement', 'payment_method'
    ];

    /**
     * Get users that own the transaction.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * Get fuel types that own the fuel transaction.
     */
    public function fuelType()
    {
        return $this->belongsTo('App\FuelType', 'fuel_type_id');
    }

    /**
     * Get fuel stations that own the transaction.
     */
    public function fuelStation()
    {
        return $this->belongsTo('App\FuelStation', 'fuel_station_id');
    }
}
