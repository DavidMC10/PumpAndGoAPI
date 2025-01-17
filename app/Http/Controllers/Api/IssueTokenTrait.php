<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 * Title: IssueTokenTrait
 * Author: ProgrammationAndroid
 * Date: 06/07/2017
 * Availability: https://github.com/ProgrammationAndroid/Laravel-Passport-Android/blob/master/laravel/app/Http/Controllers/Api/Auth/IssueTokenTrait.php
 */

trait IssueTokenTrait
{

    public function issueToken(Request $request, $grantType, $scope = "")
    {
        $params = [
            'grant_type' => $grantType,
            'client_id' => $this->client->id,
            'client_secret' => $this->client->secret,
            'scope' => $scope
        ];
        $params['username'] = $request->username ?: $request->email;

        $request->request->add($params);
        $proxy = Request::create('oauth/token', 'POST');
        return Route::dispatch($proxy);
    }
}
