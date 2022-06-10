@extends('layouts.base') 


@section('content')

<div class="row">
    <div class="col-md-2">
        @include('admin._menu')
    </div>
    <div class="col-md-10">
        <div class="d-flex justify-content-center">
            <p class="h2">Ajouter un Client</p>
        </div>
        <form method="POST" action="{{ route('admin.clients.store') }}">
            @csrf
            <div class="mb-3">
                <label for="client_name" class="form-label">Nom du client</label>
                <input type="text" class="form-control" name="client_name" id="client_name">
            </div>
            <div class="mb-3">
                <label for="client_user" class="form-label" aria-describedby="clientUserHelp">Associer un utilisateur</label>
                <select id="client_user" class="form-select">
                    <option></option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                <div id="clientUserHelp" class="form-text">Laisser vide si aucun.</div>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
</div>

@endsection