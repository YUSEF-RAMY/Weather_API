<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhotoPageController extends Controller
{
    public function render(){
        return view('pages.photos');
    }
}
