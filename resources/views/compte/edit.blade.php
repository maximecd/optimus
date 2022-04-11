@extends('layouts.app')
@section('title', 'Modification transaction')
@section('content')
    <div class="h-full">

        <div class="parametres-container h-full p-4">
            <div class="retour-setting">
                <a href="{{ route('compte.dashboard', $compte->id) }}">
                    <div class="arrow"><span>&larr;</span> Retour</div>
                </a>
            </div>
            <div class="nom-compte bg-gray-50 p-8 shadow-lg rounded-lg flex flex-col item">
                <form method="POST" action="{{ route('compte.update', $compte->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div>
                        <p class="text-xl font-bold mb-4">Nom du compte :</p>
                        <input
                            class="border-transparent shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="intitule" name="intitule" placeholder="Nom du compte"
                            value="{{ old('intitule', $compte->intitule) }}">
                    </div>
                    <div class="">
                        <button
                            class="bg-green-400 transition rounded-lg w-full justify-center items-center p-5 text-white font-bold hover:bg-green-300"
                            type="submit">
                            Enregistrer
                        </button>
                    </div>
                </form>

                @error('intitule')
                    <p>Le nom du compte est incorrect</p>
                @enderror
                <div>
                    <form action="{{ route('compte.destroy', $compte->id) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit"
                            class="bg-red-400 transition hover:bg-red-300 flex justify-center items-center rounded-lg p-5 m-auto w-full text-white font-bold">Supprimer</button>
                    </form>
                </div>
            </div>




            <div class="inviter-utilisateur bg-gray-50 p-8 shadow-lg rounded-lg flex flex-col item justify-between">
                <form method="POST" action="{{ route('compte.invite', $compte->id) }}">
                    {{ csrf_field() }}

                    {{ method_field('PUT') }}

                    <p class="text-xl font-bold mb-4">Email :</p>
                    <input
                        class="border-transparent shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="email" name="email" placeholder="domain@exemple.fr">

                    @error('intitule')
                        <p>Le mail est incorrect</p>
                    @enderror

                    <button
                        class="bg-blue-400 transition rounded-lg m-auto w-full justify-center items-center p-5 text-white font-bold hover:bg-blue-300"
                        type="submit">
                        Inviter
                    </button>

                </form>
            </div>

            <div class="utilisateurs-compte bg-gray-50 p-8 shadow-lg rounded-lg flex flex-col item justify-between">
                <p class="text-xl font-bold mb-4">Utilisateurs du compte :</p>
                <table class="table-auto w-full rounded-lg">
                </table>
            </div>
        </div>
    </div>
@endsection
