@extends('layouts.app')

@section('title', 'Dashboard')


@section('content')


    <div class="dashboard-container h-full p-4">

        <div class="solde bg-gray-50 p-8 shadow-lg rounded-lg">


            <p>Tableau de bord - {{ $compte->intitule }}</p>
            <p class="mb-8 text-lg font-bold">Votre solde : {{ $solde }}€</p>
        </div>
        <div class="historique-transaction bg-gray-50 p-8 shadow-lg rounded-lg overflow-auto">
            <p>Historique des transactions</p>
            <table class="table-auto w-full rounded-lg">

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

                            <td class="text-right"><a class="text-purple-400"
                                    href="{{ route('transaction.show', ['id' => $compte, 'id_transaction' => $transaction]) }}">Consulter</a>
                            </td>


                        </tr>
                        <tr class="border-b">
                            <td class="text-sm text-gray-500">Le {{ $transaction->date }}</td>
                            <td class="text-right"><a class="mr-2 text-green-700"
                                    href="{{ route('transaction.edit', ['id' => $compte, 'id_transaction' => $transaction]) }}">
                                    Modifier
                                </a>
                                <a class="text-red-500"
                                    href="{{ route('transaction.destroy', ['id' => $compte->id, 'id_transaction' => $transaction]) }}">
                                    Supprimer
                                </a>

                            </td>
                        </tr>
                    @endforeach
                    @if (count($transactions) == 0)
                        <tr>
                            <td colspan="5" class=""><a class="text-purple-400 underline"
                                    href="{{ route('transaction.create', $compte->id) }}">Aucune transaction. Créez-en
                                    !</a></td>
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
