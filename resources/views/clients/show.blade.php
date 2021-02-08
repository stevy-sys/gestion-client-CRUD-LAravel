@extends('layouts.app')

@section('content')
    <h1>{{ $client->name }}</h1>
    <button class="btn btn-secondary"> <a style="color: black" href="/clients/{{ $client->id}}/edit">editer</a></button>
    <form action="{{ route('clients.destroy',['client' => $client->id]) }}" method="post" style="display: inline">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">Supprimer</button>
    </form>
    <hr class="mb-5">
    <p><strong>Email :</strong>{{ $client->email }}</p>
    <p><strong>entreprise :</strong> {{ $client->entreprise->name }}</p>
@endsection