@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center h-screen">
    <div class="w-1/3 m-auto ">
        <form method="POST" action="{{ route('compte.update', $compte->id) }}">
            {{ csrf_field() }}

            {{ method_field('PUT') }}

            <div class="p-5">

                <div class="bg-gray-200 flex justify-center items-center p-5 rounded-lg w-full">
                    <label for="intitule"><b>Nom du compte :</b></label>
                    <input class="bg-transparent text-right" id="intitule" name="intitule" placeholder="Nom du compte"
                        value="{{ old('intitule', $compte->intitule) }}">
                </div>
                @error('intitule')
                <p>Le nom du compte est incorrect</p>
                @enderror

            </div>
            <div class="w-full flex m-auto p-5">
                <button
                    class="bg-green-400 rounded-lg m-auto w-full justify-center items-center p-5 text-white font-bold"
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
                    class="bg-red-400 flex justify-center items-center rounded-lg p-5 m-auto w-full text-white font-bold">Supprimer</button>
            </form>
        </div>
    </div>
</div>
@endsection