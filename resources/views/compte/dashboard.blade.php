@extends('layouts.app')

@section('title', 'Dashboard')


@section('content')


    <div class="dashboard-container h-full p-4">

        <h1 class="dashboard-title text-center text-lg mb-10">Tableau de bord - {{ $compte->intitule }}</h1>
        <div class="historique-transaction bg-gray-50 p-8 shadow-lg rounded-lg">
            <p class="mb-8 text-lg font-bold">Votre solde : {{ $solde }}€</p>

            <table class="table-auto w-full rounded-lg">
                <!-- <thead>
                                                        <tr class="text-left bg-gray-100">
                                                            <th class="p-3">Montant</th>
                                                            <th class="p-3">Intitulé</th>
                                                            <th class="p-3">Categorie</th>
                                                            <th class="p-3">Description</th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                    </thead> -->
                <tbody>
                    @foreach ($transactions as $transaction)
                        <tr class="border-t">
                            <td
                                class="{{ $transaction->sens_transaction == 'entrant' ? 'text-green-600' : 'text-red-600' }}">
                                {{ $transaction->sens_transaction == 'entrant' ? '+' : '-' }}{{ $transaction->montant }}€
                            </td>

                            <td class="text-right font-semibold" colspan="2">{{ $transaction->intitule }}</td>


                        </tr>
                        <tr>
                            <td>Catégorie</td>

                            <td class="text-right"><a class="mr-2"
                                href="{{ route('transaction.show', ['id' => $compte, 'id_transaction' => $transaction]) }}">
                                Voir
                            </a></td>

                            
                        </tr>
                        <tr class="border-b">
                            <td class="text-sm text-gray-500">Le {{$transaction->date}}</td>
                            <td class="text-right"><a class="mr-2"
                                href="{{ route('transaction.edit', ['id' => $compte, 'id_transaction' => $transaction]) }}">
                                Modifier
                            </a>
                            <a
                                href="{{ route('transaction.destroy', ['id' => $compte->id, 'id_transaction' => $transaction]) }}">
                                Supprimer
                            </a>

                        </td>
                        </tr>
                    @endforeach
                    @if (count($transactions) == 0)
                        <tr>
                            <td colspan="5" class=""><a class="text-purple-400 underline" href="{{ route('transaction.create', $compte->id) }}">Aucune transaction. Créez-en !</a></td>
                        </tr>
                    @endif
                </tbody>
            </table>



        </div>
        <div class="ajouter-transaction bg-gray-50 p-8 shadow-lg rounded-lg">
            <a href="{{ route('transaction.create', $compte->id) }}">Ajouter</a>
        </div>
        <div class="settings bg-gray-50 p-8 shadow-lg rounded-lg">
            <a href="{{ route('compte.edit', $compte->id) }}">Settings</a>
        </div>
    </div>
    
@endsection
