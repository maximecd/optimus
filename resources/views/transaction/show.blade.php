@extends('layouts.app')

@section('content')
    <div>
        <p>Intitule de la transaction : {{ $transaction->intitule }}</p>
        <p>Description de la transaction : {{ $transaction->description }}</p>
        <p>Montant de la transaction : {{ $transaction->montant }}</p>
        <p>Date de la transaction : {{ $transaction->date }}</p>
        <p>Sens de la transaction : {{ $transaction->sens_transaction }}</p>
        <p>Catégorie de la transaction : {{ $categorie->intitule }}</p>
        <p>Utilisateur de la transaction : {{ $user->name }}</p>
    </div>
    <a href="{{ route('compte.dashboard', $id_compte) }}">Retour au compte</a>
@endsection
