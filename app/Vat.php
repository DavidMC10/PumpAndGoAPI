<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vat extends Model
{

    /**
     * The table name.
     *
     * @var
     */
    protected $table = 'vat';

    /**
     * The primary key of the table.
     *
     * @var
     */
    protected $primaryKey = 'vat_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vatNo', 'vatRate'
    ];

    /**
     * Get the fuel stations who have vat.
     */
    public function fuelStation()
    {
        return $this->hasMany('App\FuelStation', 'vat_id');
    }
}
