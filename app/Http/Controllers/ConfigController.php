<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfigController extends Controller
{
    // Return API KEY for MAP
    public function __invoke()
    {
        return env('MAPBOX_ACCESS_TOKEN');
    }
    
}
