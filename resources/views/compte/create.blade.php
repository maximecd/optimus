@extends('layouts.app')

@section('content')
    <form action="{{ route('compte.store') }}" method="POST">
        @csrf
        <div>
            <label>Intitulé du compte</label>
            <div>
                <input type="text" size="100" name="intitule" placeholder="Intitulé du compte"
                    value="{{ old('intitule') }}">
            </div>
            @error('intitule')
                <p>{{ $message }}</p>
            @enderror
        </div>

        
        <div>
            <div>
                <button>Envoyer</button>

                <a href="/">Retour à la liste</a>
            </div>
        </div>
    </form>
@endsection
