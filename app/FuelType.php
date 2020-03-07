<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FuelType extends Model
{

    /**
     * The table name.
     *
     * @var
     */
    protected $table = 'fuel_type';

    /**
     * The primary key of the table.
     *
     * @var
     */
    protected $primaryKey = 'fuel_type_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fuel_type_name'
    ];

    /**
     * Get the fuel prices that have fuel types.
     */
    public function fuelPrice()
    {
        return $this->hasMany('App\FuelPrice', 'fuel_type_id');
    }

    /**
     * Get the fuel types who have transactions.
     */
    public function transaction()
    {
        return $this->hasMany('App\Transaction', 'fuel_type_id');
    }
}
