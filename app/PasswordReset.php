<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Created by David McElhinney on 14/03/2020.
 */
class PasswordReset extends Model
{

    /**
     * The table name.
     *
     * @var
     */
    protected $table = 'password_reset';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'token'
    ];
}
