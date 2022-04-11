@extends('layouts.app')

@section('title', 'Accueil')


@section('content')



    <div class="text-xl font-bold">
        Vos comptes
        <hr>
    </div>

    <div class="my-6 flex flex-nowrap">
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
                class="shadow rounded-xl w-[200px] h-[200px] bg-slate-50 hover:bg-slate-200 p-3 flex justify-center items-center">
                <p class="text-cyan-600 text-5xl">+</p>
            </div>
        </a>
    </div>

    @if (!$comptesInv->isEmpty())

        <div class="text-xl font-bold">
            Vos comptes partagés
            <hr>
        </div>

        <div class="my-6 flex flex-nowrap">
            @foreach ($comptesInv as $compteInv)
                <a href="{{ route('compte.dashboard', $compteInv->compte->id) }}">
                    <div
                        class="mr-4 shadow rounded-xl w-[200px] h-[200px] bg-slate-50 hover:bg-slate-200 transition-all p-3 flex flex-col justify-between">
                        <p class="text-lg font-bold"> {{ $compteInv->compte->intitule }}</p>
                        <p class="text-cyan-600 self-end">Accéder ➟</p>
                    </div>
                </a>
            @endforeach

        </div>

    @endif

    @if (!$invitations->isEmpty())

        <div class="text-xl font-bold">
            Invitations
            <hr>
        </div>
        

        <div class=class="my-6 flex flex-nowrap">
            @foreach ($invitations as $invitation)
                <div>

                    <div>
                        <p>{{ $invitation->admin_nom }} {{ $invitation->admin_prenom }} vous invite à rejoindre le
                            compte :
                            {{ $invitation->compte->intitule }}</p>



                        <form action="{{ route('invite.accept', $invitation->compte->id) }}" method="post">
                            @csrf
                            @method('put')
                            <button type="submit"
                                class="bg-green-400 transition hover:bg-green-300 rounded-lg p-3 text-white font-bold">Accepter</button>
                        </form>
                        <form action="{{ route('invite.decline', $invitation->compte->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit"
                                class="bg-red-400 transition hover:bg-red-300 rounded-lg p-3 text-white font-bold">Décliner</button>
                        </form>
                    </div>

                </div>
                <hr>
            @endforeach
        </div>
    @endif

@endsection
