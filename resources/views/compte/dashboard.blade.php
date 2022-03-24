@extends('layouts.app')

@section('content')

<h1 class="head-dashboard">Tableau de bord - {{ $compte->intitule }}</h1>

<div class="solde">
    <p>Votre solde :</p>
</div>

<div class="historique-transaction">
    @foreach ($transactions as $transaction)
    <tr>
        <td>{{ $transaction->id }}</td>
        <td><strong>{{ $transaction->intitule }}</strong></td>
        <td><strong>{{ $transaction->description }}</strong></td>
        <td><strong>{{ $transaction->montant }}</strong></td>
    </tr>
@endforeach
</div>

<div class="depense-recette">
    <div class="depense">
        
    </div>
    <div class="recette">
        
    </div>
</div>
@endsection