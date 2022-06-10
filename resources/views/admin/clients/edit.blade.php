@extends('layouts.base') 


@section('content')

<div class="row">
    <div class="col-md-2">
        @include('admin._menu')
    </div>
    <div class="col-md-10">
        <div class="row">
            <div class="d-flex justify-content-center">
                <p class="h2">Modifier un Client</p>
            </div>
            <form method="POST" action="{{ route('admin.clients.update', $client->id) }}">
                @method("PUT")
                @csrf
                <div class="mb-3">
                    <label for="client_name" class="form-label">Nom du client</label>
                    <input type="text" value="{{ $client->name }}" class="form-control" name="client_name" id="client_name">
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
                <button type="submit" class="btn btn-primary">Modifier</button>
            </form>
        </div>
        <div class="row">
            <div class="d-flex justify-content-center mt-5">
                <form action="{{ route('admin.clients.delete', $client->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">
                        Supprimer le client
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash mx-2" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection