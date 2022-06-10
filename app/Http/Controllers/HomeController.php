<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\Instagram;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        return view('home.index');
    }
}
