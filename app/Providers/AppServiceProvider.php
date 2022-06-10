<?php

namespace App\Providers;

use ConsoleTVs\Charts\Registrar as Charts;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Charts $charts)
    {
        $charts->register([
            \App\Charts\InstaFollowersChart::class,
            \App\Charts\InstaImpressionsChart::class,
            \App\Charts\InstaInteractionsChart::class,
            \App\Charts\InstaSubscriptionsChart::class,
            \App\Charts\InstaEngagementsChart::class,
            \App\Charts\InstaScopeChart::class,
            \App\Charts\EcommerceCartAbandonmentRates::class,
            \App\Charts\EcommerceConversionRates::class,
            \App\Charts\EcommercePm::class,
            \App\Charts\EcommerceTotalOrders::class,
            \App\Charts\EcommerceTotalSells::class,
            \App\Charts\EcommerceCustomerReturnRates::class,
        ]);
    }
}
