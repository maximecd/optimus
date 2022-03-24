@extends('layouts.app')

@section('content')
    <div>
        <p>Description de la transaction : {{ $transaction->description }}</p>
        <p>Montant de la transaction : {{ $transaction->montant }}</p>
    </div>
@endsection