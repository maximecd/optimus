@extends('layouts.app')

@section('content')

<h1 class="head-dashboard">Tableau de bord - {{ $compte->intitule }}</h1>

<div class="historique-transaction">
    <div class="solde">
        <p>Votre solde : {{$solde}}</p>
    </div>

    @foreach ($transactions as $transaction)
    <tr>
        <td>{{ $transaction->id }}</td>
        <td><strong>{{ $transaction->intitule }}</strong></td>
        <td><strong>{{ $transaction->description }}</strong></td>
        <td><strong>{{ $transaction->montant }}</strong></td>
        <td><a href="{{ route('transaction.edit', $transaction->id) }}">Modifier</a></td>
        <td>
            <form action="{{ route('transaction.destroy', $transaction->id) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit">Supprimer</button>
            </form>
        </td>
    </tr>
    @endforeach
</div>

<a href="{{ route('transaction.create', $compte->id) }}">Ajouter</a>

@endsection