<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\Clients;
use Chartisan\PHP\Chartisan;
use Illuminate\Http\Request;
use ConsoleTVs\Charts\BaseChart;

class EcommerceCartAbandonmentRates extends BaseChart
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
            $ecommerce = Clients::find(1)->ecommerces->where('data_at', '>=', $request->begin)->where('data_at', '<=', $request->end.' 23:59:59')->sortBy('data_at');
        }else{
            $begin = strtotime(date("Y-m-d")."- 30 days");
            $label = date("M Y",$begin).'->'.date('M Y');
            $ecommerce = Clients::find(1)->ecommerces->where('data_at', '>=', date("Y-m-d",$begin))->where('data_at', '<=', date('Y-m-d').' 23:59:59')->sortBy('data_at');
        }
        $dates = [];
        $cart_abandonment_rates = [];
        foreach($ecommerce as $value){
            array_push($dates, date('d', strtotime($value->data_at)));
            array_push($cart_abandonment_rates, $value->cart_abandonment_rates);
        }

        $compare = [];
        $labelCompare = '';
        if($request->comparisonBegin){
            $labelCompare = date('M Y', strtotime($request->comparisonBegin)).'->'.date('M Y', strtotime($request->comparisonEnd));
            $ecommerceCompare = Clients::find(1)->ecommerces->where('data_at', '>=', $request->comparisonBegin)->where('data_at', '<=', $request->comparisonEnd)->sortBy('data_at');
            $datesCompare = [];
            foreach($ecommerceCompare as $value){
                array_push($datesCompare, $value->getFormattedDate());
                array_push($compare, $value->cart_abandonment_rates);
            }
        }
        
        return Chartisan::build()
            ->labels($dates)
            ->dataset('Taux Abandon panier '.$label, $cart_abandonment_rates)
            ->dataset('Taux Abandon panier '.$labelCompare, $compare);
    }
}