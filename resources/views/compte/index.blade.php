@extends('layouts.app')

@section('content')
    <div class="flex flex-nowrap">
        @foreach ($comptes as $compte)
            <a href="#route-a-ajouter">
                <div class="shadow rounded-xl w-[200px] h-[200px] bg-slate-50 p-3 flex flex-col justify-between">
                    <p class="text-lg font-bold"> {{ $compte->intitule }}</p>
                    <p class="text-cyan-600 self-end">Accéder ➟</p>
                </div>
            </a>
        @endforeach

        <a href="{{ route('compte.create') }}">
            <div class="shadow rounded-xl w-[200px] h-[200px] bg-slate-50 p-3 flex justify-center items-center">
                <p class="text-cyan-600 self-end">+</p>
            </div>
        </a>
    </div>
@endsection
