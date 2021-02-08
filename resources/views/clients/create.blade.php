@extends('layouts.app')

@section('content')
<h1>Creer un client</h1>
<form action="{{ route('clients.store') }}" method="post">
    @include('includes.form')
    <button type="submit" class="btn btn-primary">Ajouter le client</button>
</form>

@endsection