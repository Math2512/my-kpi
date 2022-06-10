<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Clients;
use Illuminate\Http\Request;
use App\Managers\ClientManager;
use App\Http\Controllers\Controller;

class ClientsController extends Controller
{
    private $clientManager;

    public function __construct(ClientManager $clientManager)
    {
        $this->clientManager = $clientManager;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Clients::orderBy('name', 'ASC')->get();

        return view('admin.clients.index', ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::whereNull('clients_id')->where('role', 'USER')->get();

        return view('admin.clients.create', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->clientManager->build(new Clients(), $request);

        return redirect()->route('admin.clients.index')->with('success', "Le client a bien été enregistré");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Clients $client)
    {
        
        $users = User::whereNull('clients_id')->where('role', 'USER')->get();

        return view('admin.clients.edit', ['client' => $client, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clients $client)
    {
        $this->clientManager->build($client, $request);
        return redirect()->route('admin.clients.index')->with('success', "Le client a bien été modifié");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clients $client)
    {
        $client->delete();
        return redirect()->route('admin.clients.index')->with('success', "Le client a bien été supprimé");
    }
}
