
@extends('layouts.app')

@section('content')
    <h1>Clients</h1>
    <button  class="btn btn-info"><a style="color: black" class="nav-link" href="/clients/create">Nouveau client</a></button>
    <hr class="mb-5">
    <button class="btn btn-success bold"> <a style="color: black" class="nav-link" href="/clients?client=actif">Afficher les client actif</a></button>
    <button class="btn btn-danger bold"><a style="color: black" class="nav-link" href="/clients?client=inactif">Afficher les client Inactif</a></button>
    <button  class="btn btn-info"><a style="color: black" class="nav-link" href="/clients">Tout les clients</a></button>
    
    
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Status</th>
            <th scope="col">Entreprise</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                <tr>
                    <th scope="row">{{$client->id}}</th>
                    <td> <a href="{{ route('clients.show',['client' => $client->id]) }}">{{$client->name}}</a></td>
                    <td>{{ $client->status == 1 ? "Actif" : "Inactif" }}</td>
                    <td>{{$client->entreprise->name}}</td>
                </tr>
            @endforeach
        </tbody>
      </table>
@endsection

