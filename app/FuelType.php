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
    protected $primaryKey = 'fuel_type';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fuel_type_name'
    ];
}
