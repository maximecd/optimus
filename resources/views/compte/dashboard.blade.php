@extends('layouts.app')

@section('content')
    <h1 class="dashboard-title text-center">Tableau de bord - {{ $compte->intitule }}</h1>

    <div class="dashboard-container h-full">


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

                            <td class="text-right">route.show</td>

                            
                        </tr>
                        <tr class="border-b">
                            <td class="text-sm text-gray-500">Le XX/XX/XX</td>
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
                </tbody>
            </table>



        </div>
        <div class="ajouter-transaction bg-gray-50 p-8 shadow-lg rounded-lg">
            <a href="{{ route('transaction.create', $compte->id) }}">Ajouter</a>

        </div>
    </div>
@endsection
