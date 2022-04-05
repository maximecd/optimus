@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center h-screen">
    <div class="w-1/3 m-auto ">
        <form action="{{ route('compte.store') }}" method="POST">
            @csrf
            <div class="p-5">
                <div class="long-arrow-left">
                
                </div>
                <div class="bg-gray-200 flex justify-center items-center p-5 rounded-lg w-full">
                    <div class="w-1/3">
                        <label><b>Intitulé du compte</b></label>
                    </div>
                    <div class="w-2/3">
                        <input
                            class="border-transparent shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="text" name="intitule" placeholder="MonCompte" value="{{ old('intitule') }}">
                    </div>
                    @error('intitule')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
            </div>


            <div class="w-full flex m-auto p-5">
                <button
                    class="bg-green-400 transition rounded-lg m-auto w-full justify-center items-center p-5 text-white font-bold hover:bg-green-300">Créer</button>
            </div>
    </div>
    </form>
</div>

@endsection