@extends('layouts.app')

@section('content')
    <form action="{{ route('transaction.store') }}" method="POST">
        @csrf
        <div>
            <label>Intitulé de la transaction</label>
            <div>
                <input type="text" size="100" name="intitule" placeholder="intitulé de la transaction"
                    value="{{ old('intitule') }}">
            </div>
            @error('intitule')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>Description de la transaction</label>
            <div>
                <input type="text" size="100" name="description" placeholder="Description de la transaction"
                    value="{{ old('description') }}">
            </div>
            @error('description')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>Montant de la transaction</label>
            <div>
                <input type="text" size="100" name="montant" placeholder="Montant de la transaction"
                    value="{{ old('montant') }}">
            </div>
            @error('montant')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <div>
                <button>Envoyer</button>

                <a href="{{ route('transaction.index') }}">Retour à la liste</a>
            </div>
        </div>
    </form>
@endsection
