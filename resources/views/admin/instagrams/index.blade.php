@extends('layouts.base') 


@section('content')

<div class="row">
    <div class="col-md-2">
        @include('admin._menu')
    </div>
    <div class="col-md-10">
        <div class="d-flex justify-content-center">
            <p class="h2">Données Instagram</p>
        </div>
        <div class="d-flex justify-content-center mt-3">
            <a class="h6 font-weight-bold text-decoration-none" href="{{ route('admin.instagrams.create') }}">
                Ajouter une donnée 
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
            </a>
        </div>
        <div class="d-flex justify-content-center">
            <table class="mt-2 table table-striped table-hover table-sm">
                <thead>
                  <tr>
                    <th scope="col">Client</th>
                    <th scope="col">Date</th>
                    <th scope="col">Date de création</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($stats_insta as $stat_insta)
                        <tr>
                        <th scope="row">{{ $stat_insta->client->name }}</th>
                        <td>{{ date('d/m/Y', strtotime($stat_insta->data_at)) }}</td>
                        <td>-</td>
                        <td>-</td>
                        {{-- <td>
                            <a href="{{ route('admin.clients.edit', $client->id ) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                            </a>
                        </td> --}}
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>

@endsection