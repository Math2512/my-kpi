@extends('layouts.base') 


@section('content')

<div class="row">
    <div class="col-md-2">
        @include('admin._menu')
    </div>
    <div class="col-md-10">
        <div class="d-flex justify-content-center mb-3">
            <p class="h2">Ajouter une donnée Insta</p>
        </div>
        <form action="{{ route('admin.instagrams.store') }}" method="POST">
        @csrf
        <div class="mx-3">
            <label for="client" class="form-label">Selectionner un client :</label>
            <select class="form-select" id="client" name="client" aria-label="Default select example">
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group mx-3 mt-3">
            <label for="datetimepicker" class="form-label">Selectionner une date :</label>
            <input type='text' id='datetimepicker' name="date_at" class="form-control" />
        </div>

        <div class="row">
            <div class="col-md-2 mx-3">
                <div class="form-group mx-1 mt-3">
                    <label for="followers" class="form-label">Followers :</label>
                    <input type='text' name="followers" id="followers" class="form-control" />
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group mx-1 mt-3">
                    <label for="impressions" class="form-label">Impressions :</label>
                    <input type='text' name="impressions" id="impressions" class="form-control" />
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group mx-1 mt-3">
                    <label for="interactions" class="form-label">Interactions :</label>
                    <input type='text' name="interactions" id="interactions" class="form-control" />
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group mx-1 mt-3">
                    <label for="subscriptions" class="form-label">Subscriptions :</label>
                    <input type='text' name="subscriptions" id="subscriptions" class="form-control" />
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group mx-1 mt-3">
                    <label for="engagements" class="form-label">Engagements :</label>
                    <input type='text' name="engagements" id="engagements" class="form-control" />
                </div>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary mx-3 mt-3">Enregistrer</button>
        </form>
    </div>
</div>
@endsection
