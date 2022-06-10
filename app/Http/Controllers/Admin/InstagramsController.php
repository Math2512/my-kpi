<?php

namespace App\Http\Controllers\Admin;

use App\Models\Clients;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Managers\InstagramManager;
use App\Models\Instagram;

class InstagramsController extends Controller
{
    private $instagramManager;

    public function __construct(InstagramManager $instagramManager)
    {
        $this->instagramManager = $instagramManager;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stats_insta = Instagram::orderBy('data_at', 'DESC')->get();

        return view('admin.instagrams.index', ['stats_insta' => $stats_insta]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Clients::orderBy('name', 'ASC')->get();
        return view('admin.instagrams.create', ['clients' => $clients]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->instagramManager->build(new Instagram(), $request);
        return redirect()->route('admin.instagrams.index')->with('success', "Les données insta ont bien été enregistré");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
