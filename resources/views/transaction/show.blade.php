@extends('layouts.app')

@section('title', 'Consulter une transaction')

@section('content')
<div>
    <div class="flex justify-center items-center h-full">
        <div class="sm:w-full lg:w-3/5 m-auto ">
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
                            <label>Utilisateur de la transaction</label>
                        </div>
                        <div class="w-2/3">
                            <input disabled class="border-transparent shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $user->name }}">
                        </div>
                    </div>
                    @error('intitule')
                    <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="p-5">

                    <div class="bg-gray-200 flex space-between items-center p-5 rounded-lg w-full">
                        <div class="w-1/3">
                            <label>Intitule de la transaction</label>
                        </div>
                        <div class="w-2/3">
                            <input disabled class="border-transparent shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $transaction->intitule }}">
                        </div>
                    </div>
                    @error('intitule')
                    <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="p-5">

                    <div class="bg-gray-200 flex space-between items-center p-5 rounded-lg w-full">
                        <div class="w-1/3">
                            <label>Catégorie de la transaction</label>
                        </div>
                        <div class="w-2/3">
                            <input disabled class="border-transparent shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $categorie->intitule }}">
                        </div>

                    </div>
                </div>

                <div class="p-5">

                    <div class="bg-gray-200 flex space-between items-center p-5 rounded-lg w-full">
                        <div class="w-1/3">
                            <label>Description de la transaction</label>
                        </div>
                        <div class="w-2/3">
                            <input disabled class="border-transparent shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $transaction->description }}">
                        </div>
                    </div>
                    @error('description')
                    <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="p-5">

                    <div class="bg-gray-200 flex space-between items-center p-5 rounded-lg w-full">
                        <div class="w-1/3">
                            <label>Montant de la transaction</label>
                        </div>
                        <div class="w-2/3">
                            <input disabled class="border-transparent shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $transaction->montant }}">
                        </div>
                    </div>
                    @error('montant')
                    <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="p-5">

                    <div class="bg-gray-200 flex space-between items-center p-5 rounded-lg w-full">
                        <div class="w-1/3">
                            <label>Date</label>
                        </div>
                        <div class="w-2/3">
                            <input disabled class="border-transparent shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $transaction->date }}">
                        </div>
                    </div>
                    @error('sens_transaction')
                    <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="p-5">
                    <div class="bg-gray-200 flex space-between items-center p-5 rounded-lg w-full">
                        <div class="w-1/3">
                            <p>Sens de la transaction</p>
                        </div>
                        <div class="w-2/3">
                            <input disabled class="border-transparent shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $transaction->sens_transaction }}">
                        </div>
                    </div>
                    @error('date')
                    <p>{{ $message }}</p>
                    @enderror
                </div>

                <div>
            </form>
        </div>
    </div>






</div>

@endsection