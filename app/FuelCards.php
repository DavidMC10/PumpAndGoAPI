<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FuelCards extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fuelCardNo', 'expiryDate'
    ];

    /**
     * Get the users who have fuel cards.
     */
    public function users()
    {
        return $this->hasMany('App\Users');
    }
}
