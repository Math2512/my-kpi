<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;

class EcommerceController extends Controller
{
    function index()
    {
        return view('ecommerce.index');
    }

    function show(string $data)
    {
        $ecommerce = Clients::find(1) ? Clients::find(1)->ecommerces->sortByDesc('data_at') : [];
        return view('ecommerce.show', ['data' =>$data , 'ecommerce' =>$ecommerce]);
    }
}
