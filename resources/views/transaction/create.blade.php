@extends('layouts.app')

@section('title', 'Nouvelle transaction')


@section('content')
<div class="flex justify-center items-center h-full">
    <div class="sm:w-full lg:w-3/5 m-auto">
        <form action="{{ route('transaction.store', $id_compte) }}" method="POST">
            @csrf
            <div class="p-5">
                <div class="mb-2">
                    <a href="{{ route('compte.dashboard', $id_compte) }}">
                        <div class="arrow"><span>&larr;</span> Retour</div>
                    </a>
                </div>

                <div class="bg-gray-200 flex space-between items-center p-5 rounded-lg w-full">
                    <div class="w-1/3">
                        <label><b>Intitulé : </b></label>
                    </div>
                    <div class="w-2/3">
                        <input
                            class=" border-transparent shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-full"
                            name="intitule" type="text" placeholder="Intitulé" value="{{ old('intitule') }}">
                    </div>
                </div>
                @error('intitule')
                <p>{{ $message }}</p>
                @enderror
            </div>

            <div class="p-5">

                <div class="bg-gray-200 flex space-between items-center p-5 rounded-lg w-full">
                    <div class="w-1/3">
                        <label><b>Categorie : </b></label>
                    </div>
                    <div class="w-2/3">
                        <select
                            class="border-transparent shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="id_categorie">
                            @foreach ($categories as $categorie)
                            <option value="{{ $categorie->id }}">
                                {{ $categorie->intitule }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>

            <div class="p-5">

                <div class="bg-gray-200 flex space-between items-center p-5 rounded-lg w-full">
                    <div class="w-1/3">
                        <label><b>Description : </b></label>
                    </div>
                    <div class="w-2/3">
                        <input
                            class="border-transparent shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="text" name="description" placeholder="Description de la transaction"
                            value="{{ old('description') }}">
                    </div>
                </div>
                @error('description')
                <p>{{ $message }}</p>
                @enderror
            </div>

            <div class="p-5">

                <div class="bg-gray-200 flex space-between items-center p-5 rounded-lg w-full">
                    <div class="w-1/3">
                        <label><b>Montant : </b></label>
                    </div>
                    <div class="w-2/3">
                        <input
                            class="border-transparent shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="number" step="0.01" size="100" name="montant" placeholder="Montant de la transaction"
                            value="{{ old('montant') }}">
                    </div>
                </div>
                @error('montant')
                <p>{{ $message }}</p>
                @enderror
            </div>

            <div class="p-5">

                <div class="bg-gray-200 flex space-between items-center p-5 rounded-lg w-full">
                    <div class="w-1/3">
                        <label><b>Sens de la transaction : </b></label>
                    </div>
                    <div class="w-2/3">
                        <select name="sens_transaction"
                            class="border-transparent shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="entrant">Entrant</option>
                            <option value="sortant">Sortant</option>

                        </select>
                    </div>
                </div>
                @error('sens_transaction')
                <p>{{ $message }}</p>
                @enderror
            </div>

            <div class="p-5">

                <div class="bg-gray-200 flex space-between items-center p-5 rounded-lg w-full">
                    <div class="w-1/3">
                        <label><b>Date : </b></label>
                    </div>
                    <div class="w-2/3">
                        <input
                            class="border-transparent shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="date" size="100" name="date" value="{{ old('date') }}">
                    </div>
                </div>
                @error('date')
                <p>{{ $message }}</p>
                @enderror
            </div>

            <div>
                <div class="p-5">
                    <button
                        class="bg-green-400 transition hover:bg-green-300 rounded-lg m-auto w-full justify-center items-center p-5 text-white font-bold">Enregistrer</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection