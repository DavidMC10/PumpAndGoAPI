<?php

namespace App\Http\Controllers\Api;

use App\Events\MyEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PumpController extends Controller
{
    /**
     * Turn the pump controller on.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function turnPumpOnTest()
    {

        for ($i = 0; $i < 10; $i++) {
            event(new MyEvent('hello world' + $i));
            sleep(2);
        }
    }
}
