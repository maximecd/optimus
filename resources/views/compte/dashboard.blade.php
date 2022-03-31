@extends('layouts.app')

@section('content')
    <h1 class="dashboard-title text-center">Tableau de bord - {{ $compte->intitule }}</h1>

    <div class="dashboard-container h-full">


        <div class="historique-transaction bg-gray-50 p-8 shadow-lg rounded-lg">
            <p class="mb-8 text-lg font-bold">Votre solde : {{ $solde }}€</p>

            <table class="table-auto w-full rounded-lg">
                <thead>
                    <tr class="text-left bg-gray-100">
                        <th class="p-3">Montant</th>
                        <th class="p-3">Intitulé</th>
                        <th class="p-3">Categorie</th>
                        <th class="p-3">Description</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                        
                        <tr
                            class="border-b
                    {{ $transaction->sens_transaction == 'entrant' ? 'bg-green-100' : 'bg-red-100' }}">
                            <td class="p-3">
                                {{ $transaction->sens_transaction == 'entrant' ? '+' : '-' }}{{ $transaction->montant }}€
                            </td>
                            <td class="p-3">{{ $transaction->intitule }}</td>
                            <td class="p-3">Categ *à récupérer*</td>
                            <td class="p-3">{{ $transaction->description }}</td>
                            <td><a
                                    href="{{ route('transaction.edit', ['id' => $compte, 'id_transaction' => $transaction]) }}">Modifier</a>
                            </td>
                            <td>
                                <form
                                    action="{{ route('transaction.destroy', [$compte->id, 'id_transaction' => $transaction]) }}"
                                    method="post">
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
        <div class="ajouter-transaction bg-gray-50 p-8 shadow-lg rounded-lg">
            <a href="{{ route('transaction.create', $compte->id) }}">Ajouter</a>

        </div>
    </div>
@endsection
