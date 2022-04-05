@extends('layouts.app')

@section('title', 'Dashboard')


@section('content')


    <div class="dashboard-container h-full p-4">

        <h1 class="dashboard-title text-center text-lg mb-10">Tableau de bord - {{ $compte->intitule }}</h1>
        <div class="historique-transaction bg-gray-50 p-8 shadow-lg rounded-lg overflow-auto h-[560px]">
            <p class="mb-8 text-lg font-bold">Votre solde : {{ $solde }}€</p>

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
                                    href="{{ route('transaction.show', ['id' => $compte, 'id_transaction' => $transaction]) }}">Consulter</a></td>


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
    <div class="justify-content">
        <a href="{{ route('transaction.create', $compte->id) }}" class="w-[200px] h-[560px]">
            <div
                class="shadow rounded-xl w-[200px] h-[560px] bg-slate-50 hover:bg-slate-200 __DIR__ p-3 flex justify-center items-center">
                <p class="text-cyan-600 text-5xl">+</p>
            </div>
        </a>
        <a href="{{ route('compte.edit', $compte->id) }}" class="w-[200px] h-[560px]">
            <div
                class="shadow rounded-xl w-[200px] h-[560px] bg-slate-50 hover:bg-slate-200 __DIR__ p-3 flex justify-center items-center">
                Settings
            </div>
        </a>
    </div>
</div>

@endsection
