@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="h-full">

    <div class="dashboard-container h-full p-4">
        <div class="retour">
            <a href="{{ route('compte.index') }}">
                <div class="arrow"><span>&larr;</span> Retour</div>
            </a>
        </div>
        <div class="solde bg-gray-50 p-8 shadow-lg rounded-lg relative ">
            <p class="font-bold text-xl mb-4">Bienvenue {{ $user->name }} !</p>
            <hr>
            <br>
            <p>Vous êtes sur le tableau de bord du compte : <span class="font-bold">{{ $compte->intitule }}</span></p>
            <br>
            <div class="mb-8 absolute bottom-0">
                <p class=" text-xl">Solde : <span
                        class="font-bold text-2xl {{ $solde > 0 ? 'text-green-600' : 'text-red-600'}}"> {{ $solde }}
                        €</span></p>
                <p class="tips italic">
                    @if ($solde <= 50) 
                    Vous devriez faire attention à vos dépenses ! 
                    @elseif ($solde >= 500 && $solde <1200)
                    Continuez ainsi vous êtes dans le droit chemin !
                    @elseif ($solde >= 1200)
                    Essayez d'investir ou d'épargnez !
                    @endif
                </p>
            </div>

        </div>
        <div class="historique-transaction bg-gray-50 p-8 shadow-lg rounded-lg overflow-auto">
            <p class="text-xl font-bold mb-4">Historique des transactions</p>
            <table class="table-auto w-full rounded-lg">

                <tbody>
                    @foreach ($transactions as $transaction)
                    <tr class="border-t ">
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
                                onclick="verif('{{ route('transaction.destroy', ['id' => $compte->id, 'id_transaction' => $transaction]) }}','supprimer la transaction')"
                                href="#">
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
        <div class="ajouter-transaction bg-gray-50 p-8 shadow-lg rounded-lg flex items-center justify-center">
            <a href="{{ route('transaction.create', $compte->id) }}">Ajouter une transaction</a>
        </div>
        <div class="settings bg-gray-50 p-8 shadow-lg rounded-lg flex items-center justify-center">
            <a href="{{ route('compte.edit', $compte->id) }}">Paramètres du compte</a>
        </div>
    </div>
</div>

@endsection