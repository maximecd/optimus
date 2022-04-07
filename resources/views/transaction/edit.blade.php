@extends('layouts.app')

@section('title', 'Editer une transaction')

@section('content')
    <div class="flex justify-center items-center h-full">
        <div class="sm:w-full lg:w-3/5 m-auto">
            <form action="{{ route('transaction.update', ['id' => $compte, 'id_transaction' => $transaction]) }}"
                method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="p-5">

                    <div class="mb-2">
                        <a href="{{ route('compte.dashboard', $compte->id) }}">
                            <div class="arrow"><span>&larr;</span> Retour</div>
                        </a>
                    </div>

                    <div class="bg-gray-200 flex space-between items-center p-5 rounded-lg w-full">
                        <div class="w-1/3">
                            <label for="intitule">Intitule de la transaction</label>
                        </div>
                        <div class="w-2/3">
                            <input
                                class=" border-transparent shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-full"
                                id="intitule" name="intitule" placeholder="Intitule de la transaction"
                                value="{{ old('intitule', $transaction->intitule) }}">
                        </div>
                    </div>
                    @error('intitule')
                        <p>L'intitulé de la transaction est incorrect</p>
                    @enderror

                </div>

                <div class="p-5">
                    <div class="bg-gray-200 flex space-between items-center p-5 rounded-lg w-full">
                        <div class="w-1/3">
                            <label>Categorie : </label>
                        </div>
                        <div class="w-2/3">
                            <select
                                class="border-transparent shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                name="id_categorie">
                                @foreach ($categories as $categorie)
                                    <option {{ $transaction->id_categorie == $categorie->id ? 'selected' : '' }}
                                        value="{{ $categorie->id }}">
                                        {{ $categorie->intitule }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="p-5">

                    <div class="bg-gray-200 flex space-between items-center p-5 rounded-lg w-full">
                        <div class="w-1/3">
                            <label for="description">Description de la transaction</label>
                        </div>
                        <div class="w-2/3">
                            <input
                                class="border-transparent shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="description" name="description" placeholder="Description de la transaction"
                                value="{{ old('description', $transaction->description) }}">
                        </div>
                    </div>
                    @error('description')
                        <p>La description de la transaction est incorrect</p>
                    @enderror

                </div>

                <div class="p-5">

                    <div class="bg-gray-200 flex space-between items-center p-5 rounded-lg w-full">
                        <div class="w-1/3">
                            <label for="montant">Montant de la transaction</label>
                        </div>
                        <div class="w-2/3">
                            <input
                                class="border-transparent shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                type="number" step="0.01" id="montant" name="montant"
                                placeholder="Montant de la transaction"
                                value="{{ old('montant', $transaction->montant) }}">
                        </div>
                    </div>
                    @error('montant')
                        <p>Le montant de la transaction est incorrect</p>
                    @enderror

                </div>

                <div class="p-5">

                    <div class="bg-gray-200 flex space-between items-center p-5 rounded-lg w-full">
                        <div class="w-1/3">
                            <label>Sens de la transaction : </label>
                        </div>
                        <div class="w-2/3">
                            <select name="sens_transaction"
                                class="border-transparent shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option {{ $transaction->sens_transaction == 'entrant' ? 'selected' : '' }}
                                    value="entrant">
                                    Entrant</option>
                                <option {{ $transaction->sens_transaction == 'sortant' ? 'selected' : '' }}
                                    value="sortant">
                                    Sortant</option>
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
                            <label>Date de la transaction</label>
                        </div>
                        <div class="w-2/3">
                            <input
                                class="border-transparent shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                type="date" size="100" name="date" value="{{ old('date', $transaction->date) }}">
                        </div>
                    </div>
                    @error('date')
                        <p>{{ $message }}</p>
                    @enderror
                </div>


                <div class="w-full flex m-auto p-5">
                    <button
                        class="bg-green-400 transition rounded-lg m-auto w-full justify-center items-center p-5 text-white font-bold hover:bg-green-300"
                        type="submit">
                        Enregistrer
                    </button>
                </div>


            </form>


        </div>
    </div>

@endsection
