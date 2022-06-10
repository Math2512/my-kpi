<?php

namespace App\Managers;

use App\Models\Clients;

class ClientManager 
{

    public function build(Clients $client, $request)
    {
        $client->name = $request->client_name;
        $client->save();

    }
}
