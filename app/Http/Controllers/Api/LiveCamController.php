<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LiveCamController extends Controller
{
    public function render(){
        return view('pages.livecam');
    }
}
