@extends('layouts.app')

@section('content')
    <form action="{{ route('transaction.store', $id_compte) }}" method="POST">
        @csrf
        <div>
            <label>Intitulé de la transaction</label>
            <div>
                <input class="create-trans" type="text" size="100" name="intitule" placeholder="intitulé de la transaction"
                    value="{{ old('intitule') }}">
            </div>
            @error('intitule')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>Categorie : </label>
            <div>
                <select name="id_categorie">
                    @foreach ($categories as $categorie)
                        <option value="{{ $categorie->id }}">
                            {{ $categorie->intitule }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div>
            <label>Description de la transaction</label>
            <div>
                <input class="create-trans" type="text" size="100" name="description" placeholder="Description de la transaction"
                    value="{{ old('description') }}">
            </div>
            @error('description')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>Montant de la transaction</label>
            <div>
                <input class="create-trans" type="number" step="0.01" size="100" name="montant" placeholder="Montant de la transaction"
                    value="{{ old('montant') }}">
            </div>
            @error('montant')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>Sens de la transaction : </label>
            <div>
                <select name="sens_transaction">
                    <option value="entrant">Entrant</option>
                    <option value="sortant">Sortant</option>

                </select>
            </div>
            @error('sens_transaction')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <div>
                <button>Envoyer</button>

                <a href="{{ route('compte.dashboard', $id_compte) }}">Retour au compte</a>
            </div>
        </div>
    </form>
@endsection
