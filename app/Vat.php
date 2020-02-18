<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vat extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vatNo', 'vatRate'
    ];
}
