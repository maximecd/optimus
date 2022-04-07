@extends('layouts.app')

@section('title', 'Accueil')


@section('content')
    <div class="flex flex-nowrap">
        @foreach ($comptes as $compte)
            <a href="{{ route('compte.dashboard', $compte->id) }}">
                <div
                    class="mr-4 shadow rounded-xl w-[200px] h-[200px] bg-slate-50 hover:bg-slate-200 transition-all p-3 flex flex-col justify-between">
                    <p class="text-lg font-bold"> {{ $compte->intitule }}</p>
                    <p class="text-cyan-600 self-end">Accéder ➟</p>
                </div>
            </a>
        @endforeach

        <a href="{{ route('compte.create') }}">
            <div
                class="shadow rounded-xl w-[200px] h-[200px] bg-slate-50 hover:bg-slate-200 __DIR__ p-3 flex justify-center items-center">
                <p class="text-cyan-600 text-5xl">+</p>
            </div>
        </a>
    </div>
    <hr>
    <div class>
        @foreach ($invitations as $invitation)
        <div>
           
                <div>
                <p>{{ $invitation->admin_nom }} {{ $invitation->admin_prenom }} vous invite à rejoindre le compte : {{ $invitation->compte->intitule }}</p>
                   
               
                   
                    <form action="{{ route('invite.decline', $invitation->compte->id) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit"
                            class="bg-red-400 transition hover:bg-red-300 rounded-lg p-3 text-white font-bold">Décliner</button>
                    </form>
                </div>
            
        </div>
        <hr>
        @endforeach
    </div>
@endsection
