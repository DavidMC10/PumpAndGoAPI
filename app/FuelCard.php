<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Created by David McElhinney on 14/03/2020.
 */
class FuelCard extends Model
{

    /**
     * The table name.
     *
     * @var
     */
    protected $table = 'fuel_card';

    /**
     * The primary key of the table.
     *
     * @var
     */
    protected $primaryKey = 'fuel_card_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fuel_card_no', 'expiry_date'
    ];

    /**
     * Get the users who have fuel cards.
     */
    public function user()
    {
        return $this->hasMany('App\User', 'fuel_card_id');
    }
}
