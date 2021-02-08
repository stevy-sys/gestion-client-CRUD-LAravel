@extends('layouts.app')

@section('content')
<h1>Creer un client</h1>
<form action="{{ route('clients.update',['client' => $client->id]) }}" method="post">
    @method('PATCH')
    @include('includes.form')
    <button type="submit" class="btn btn-primary">Sauvergarder la modification</button>
</form>

@endsection