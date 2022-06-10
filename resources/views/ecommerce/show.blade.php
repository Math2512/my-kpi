@extends('layouts.base') 


@section('content')

<div class="row d-flex mb-3">
    <div class="col-md-5 col-xs-12">
        <label for="begin" class="form-label">Début :</label>
        <input type="date" class="form-control" id="begin" value="{{ date('Y-m-d', strtotime(date("Y-m-d")."- 30 days")) }}" name="begin" onchange="getDate()">
    </div>
    <div class="col-md-5 col-xs-12">
        <label for="end" class="form-label">Fin :</label>
        <input type="date" class="form-control" id="end" value="{{ date('Y-m-d')}}" name="end" onchange="getDate()">
    </div>
    <div class="col-md-2 col-xs-12 d-flex justify-content-left align-items-center">
        <a href="#" onclick="showComparison()" class="pt-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-file-diff-fill" viewBox="0 0 16 16">
                <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM8.5 4.5V6H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V7H6a.5.5 0 0 1 0-1h1.5V4.5a.5.5 0 0 1 1 0zM6 10h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1 0-1z"/>
            </svg>
        </a>
    </div>
</div>    
<div class="row d-flex mb-3 comparison d-none">
    <div class="col-md-5 col-xs-12">
        <label for="compare-begin" class="form-label">Début :</label>
        <input type="date" class="form-control" id="compare-begin" name="end" onchange="getDate()">
    </div>
    <div class="col-md-5 col-xs-12">
        <label for="compare-end" class="form-label">Fin :</label>
        <input type="date" class="form-control" id="compare-end" name="end" onchange="getDate()">
    </div>
</div>            
<div class="row d-flex justify-content-around">
    <div class="col-md-12 col-xs-12">
      <div class="card border-primary mb-3">
        <div class="card-header"></div>
        <div class="card-body">
          <div class="data" id="{{ $data }}" style="height: 300px;"></div>
        </div>
      </div>
    </div>
</div>

@endsection

@section('ecommerce-javascript')

<script>

function showComparison(){
    if($('.comparison').is(":visible"))
        $('.comparison').addClass('d-none')
    else{
        $('#begin').val('')
        $('#end').val('')
        $('.comparison').removeClass('d-none')
    }
}

function getDate(){
      begin = $('#begin').val()
      end   = $('#end').val()
      if($('.comparison').is(":visible")){
        compareBegin = $('#compare-begin').val()
        compareEnd   = $('#compare-end').val()
        url = `?begin=${begin}&end=${end}&comparisonBegin=${compareBegin}&comparisonEnd=${compareEnd}`
      }else{
        url = `?begin=${begin}&end=${end}`
      }

      id = $('.data')[0].id
      $('#'+id).html('')
      getChart(url)
}

$(document).ready(function () {
    
    url = ''
    id = $('.data')[0].id
    $('#'+id).html('')
    getChart(url)
    
    if ($('.data')[0].id == 'sells')
        $('.card-header').html('Nombre de Followers')
    else if ($('.data')[0].id == 'pm')
        $('.card-header').html('pm')
    else if ($('.data')[0].id == 'conversion')
        $('.card-header').html('Nombre d’impressions')
    else if ($('.data')[0].id == 'abandonment')
        $('.card-header').html('Nombre d’interactions')
    else if ($('.data')[0].id == 'return')
        $('.card-header').html('Abonnements suite à une publication')
    else if ($('.data')[0].id == 'orders')
        $('.card-header').html('Taux d\'engagement')
        
});

function getChart(url){
    if ($('.data')[0].id == 'sells'){
        const chart_followers = new Chartisan({
            el: '#sells',
            url: "@chart('ecommerce_total_sells')"  + url,
            hooks: new ChartisanHooks()
            .colors(['#44924c', '#000'])
            .datasets([{ type: 'line', fill: true  }])
            .tooltip(),
        });
    }
    else if ($('.data')[0].id == 'pm'){
        const chart_scope = new Chartisan({
            el: '#pm',
            url: "@chart('ecommerce_pm')"  + url,
            hooks: new ChartisanHooks()
            .colors(['#44924c', '#000'])
            .datasets([{ type: 'line', fill: true  }])
            .tooltip(),
        });
    }
    else if ($('.data')[0].id == 'conversion'){
        const chart_impressions = new Chartisan({
            el: '#conversion',
            url: "@chart('ecommerce_conversion_rates')"  + url,
            hooks: new ChartisanHooks()
            .colors(['#44924c', '#000'])
            .datasets([{ type: 'line', fill: true  }])
            .tooltip(),
        });
    }
    else if ($('.data')[0].id == 'abandonment'){
        const chart_interactions = new Chartisan({
            el: '#abandonment',
            url: "@chart('ecommerce_cart_abandonment_rates')"  + url,
            hooks: new ChartisanHooks()
            .colors(['#44924c', '#000'])
            .datasets([{ type: 'line', fill: true  }])
            .tooltip(),
        });
    }
    else if ($('.data')[0].id == 'return'){
        const chart_subscriptions = new Chartisan({
            el: '#return',
            url: "@chart('ecommerce_customer_return_rates')"  + url,
            hooks: new ChartisanHooks()
            .colors(['#44924c', '#000'])
            .datasets([{ type: 'line', fill: true  }])
            .tooltip(),
        });
    }
    else if ($('.data')[0].id == 'orders'){
        const chart_engagements = new Chartisan({
            el: '#orders',
            url: "@chart('ecommerce_total_orders')"  + url,
            hooks: new ChartisanHooks()
            .colors(['#44924c', '#000'])
            .datasets([{ type: 'line', fill: true  }])
            .tooltip(),
        });
    }
}

</script>  
@endsection