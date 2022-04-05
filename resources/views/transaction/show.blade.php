@extends('layouts.app')

@section('content')
<div>
    <div class="flex justify-center items-center h-full">
        <div class="w-2/5 m-auto ">
            <form action="{{ route('transaction.store', $id_compte) }}" method="POST">
                @csrf

                <div class="p-5">

                    <div class="bg-gray-200 flex space-between items-center p-5 rounded-lg w-full">
                        <div class="w-1/3">
                            <label><b>Utilisateur de la transaction : </b></label>
                        </div>
                        <div class="w-2/3">
                            <p>{{ $user->name }}</p>
                        </div>
                    </div>
                    @error('intitule')
                    <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="p-5">

                    <div class="bg-gray-200 flex space-between items-center p-5 rounded-lg w-full">
                        <div class="w-1/3">
                            <label><b>Intitule de la transaction : </b></label>
                        </div>
                        <div class="w-2/3">
                            <p>{{ $transaction->intitule }}</p>
                        </div>
                    </div>
                    @error('intitule')
                    <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="p-5">

                    <div class="bg-gray-200 flex space-between items-center p-5 rounded-lg w-full">
                        <div class="w-1/3">
                            <label><b>Catégorie de la transaction : </b></label>
                        </div>
                        <div class="w-2/3">
                            <p>{{ $categorie->intitule }}</p>
                        </div>

                    </div>
                </div>

                <div class="p-5">

                    <div class="bg-gray-200 flex space-between items-center p-5 rounded-lg w-full">
                        <div class="w-1/3">
                            <label><b>Description de la transaction : </b></label>
                        </div>
                        <div class="w-2/3">
                            <p>{{ $transaction->description }}</p>
                        </div>
                    </div>
                    @error('description')
                    <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="p-5">

                    <div class="bg-gray-200 flex space-between items-center p-5 rounded-lg w-full">
                        <div class="w-1/3">
                            <label><b>Montant de la transaction : </b></label>
                        </div>
                        <div class="w-2/3">
                            <p>{{ $transaction->montant }}</p>
                        </div>
                    </div>
                    @error('montant')
                    <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="p-5">

                    <div class="bg-gray-200 flex space-between items-center p-5 rounded-lg w-full">
                        <div class="w-1/3">
                            <label><b>Date : </b></label>
                        </div>
                        <div class="w-2/3">
                            <p>{{ $transaction->date }}</p>
                        </div>
                    </div>
                    @error('sens_transaction')
                    <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="p-5">

                    <div class="bg-gray-200 flex space-between items-center p-5 rounded-lg w-full">
                        <div class="w-1/3">
                            <p>Sens de la transaction : </p>
                        </div>
                        <div class="w-2/3">
                            <p>{{ $transaction->sens_transaction }}</p>
                        </div>
                    </div>
                    @error('date')
                    <p>{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <div class="p-5">
                        <div class="w-full">
                            <a href="{{ route('compte.dashboard', $id_compte) }}"
                                class=" bg-green-400 transition hover:bg-green-300 rounded-lg m-auto w-full justify-center items-center p-5 text-white font-bold">
                                Retour au compte
                            </a>
                        </div>
                    </div>
            </form>
        </div>
    </div>






</div>

@endsection