<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;

class InstagramController extends Controller
{
    function index()
    {
        $insta = Clients::find(1) ? Clients::find(1)->instagrams : []; 
        return view('instagram.index');
    }

    function show(string $data)
    {
        $insta = Clients::find(1) ? Clients::find(1)->instagrams->sortByDesc('data_at') : [];
        return view('instagram.show', ['data' =>$data , 'insta' =>$insta]);
    }
}
