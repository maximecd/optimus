@extends('layouts.app')

@section('content')

    <a class="button is-info" href="{{ route('transaction.create') }}">Créer une transaction</a>

    <div>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Intitule de la transaction</th>
                    <th>Description</th>
                    <th>Montant</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td><strong>{{ $transaction->intitule }}</strong></td>
                        <td><strong>{{ $transaction->description }}</strong></td>
                        <td><strong>{{ $transaction->montant }}</strong></td>
                        <td><a href="{{ route('transaction.show', $transaction->id) }}">Voir</a></td>
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
            </tbody>
        </table>
    </div>
@endsection