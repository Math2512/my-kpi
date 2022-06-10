<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\Clients;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class InstaFollowersChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {   
        if($request->begin){
            $label = date('M Y', strtotime($request->begin)).'->'.date('M Y', strtotime($request->end));
            $instas = Clients::find(1)->instagrams->where('data_at', '>=', $request->begin)->where('data_at', '<=', $request->end.' 23:59:59')->sortBy('data_at');
        }else{
            $begin = strtotime(date("Y-m-d")."- 30 days");
            $label = date("M Y",$begin).'->'.date('M Y');
            $instas = Clients::find(1)->instagrams->where('data_at', '>=', date("Y-m-d",$begin))->where('data_at', '<=', date('Y-m-d').' 23:59:59')->sortBy('data_at');
        }
        $dates = [];
        $followers = [];
        foreach($instas as $value){
            array_push($dates, date('d', strtotime($value->data_at)));
            array_push($followers, $value->followers);
        }
        
        $followersCompare = [];
        $labelCompare = '';
        if($request->comparisonBegin){
            $labelCompare = date('M Y', strtotime($request->comparisonBegin)).'->'.date('M Y', strtotime($request->comparisonEnd));
            $instasCompare = Clients::find(1)->instagrams->where('data_at', '>=', $request->comparisonBegin)->where('data_at', '<=', $request->comparisonEnd)->sortBy('data_at');
            $datesCompare = [];
            foreach($instasCompare as $value){
                array_push($datesCompare, $value->getFormattedDate());
                array_push($followersCompare, $value->followers);
            }
        }

        return Chartisan::build()
            ->labels($dates)
            ->dataset('Followers '.$label, $followers)
            ->dataset('Followers '.$labelCompare, $followersCompare);
    }
}