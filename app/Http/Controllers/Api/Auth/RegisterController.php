<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Client;

class RegisterController extends Controller
{

    use IssueTokenTrait;

    private $client;

    public function __construct() {
        $this->client = Client::find(1);
    }

    public function register(Request $request) {

    	$this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
    		'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'maxFuelLimit' => 'required',
            'maxDistanceLimit' => 'required'
    	]);

        $user = User::create([
            'firstName' => request('firstName'),
            'lastName' => request('lastName'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'maxFuelLimit' => request('maxFuelLimit'),
            'maxDistanceLimit' => request('maxDistanceLimit')
        ]);

        return $this->issueToken($request, 'password');
    }
}
