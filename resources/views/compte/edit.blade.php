@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center h-screen">
        <div class="w-1/3 m-auto ">
            <a href="{{ route('compte.dashboard', $compte->id) }}">
                <div class="arrow"><span>&larr;</span> Retour</div>
            </a>



            <form method="POST" action="{{ route('compte.update', $compte->id) }}">
                {{ csrf_field() }}

                {{ method_field('PUT') }}

                <div class="p-5">

                    <div class="bg-gray-200 flex justify-center items-center p-5 rounded-lg w-full">
                        <div class="w-1/3">
                            <label for="intitule"><b>Nom du compte :</b></label>
                        </div>
                        <div class="w-2/3">
                            <input
                                class="border-transparent shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="intitule" name="intitule" placeholder="Nom du compte"
                                value="{{ old('intitule', $compte->intitule) }}">
                        </div>
                    </div>
                    @error('intitule')
                        <p>Le nom du compte est incorrect</p>
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

            <div class="p-5">
                <form action="{{ route('compte.destroy', $compte->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit"
                        class="bg-red-400 transition hover:bg-red-300 flex justify-center items-center rounded-lg p-5 m-auto w-full text-white font-bold">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
@endsection
