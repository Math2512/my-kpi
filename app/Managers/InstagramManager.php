<?php

namespace App\Managers;

use App\Models\Clients;
use App\Models\Instagram;

class InstagramManager 
{

    public function build(Instagram $insta, $request)
    { 
        $date = explode('/', $request->date_at);
        $timestamp = strtotime($date[2]."-".$date[1]."-".$date[0]);
        $datetime = date('Y-m-d H:i:s', $timestamp);
        
        $insta->clients_id = $request->client;
        $insta->data_at = $datetime;
        $insta->followers = $request->followers;
        $insta->impressions = $request->impressions;
        $insta->interactions = $request->interactions;
        $insta->subscription = $request->subscriptions;
        $insta->engagement = $request->engagements;
        $insta->save();

    }
}
