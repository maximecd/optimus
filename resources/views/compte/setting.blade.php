@extends('layouts.app')

@section('content')
<div>
    <div>
        <div>
            <form method="POST" action="{{ route('compte.update', $compte->id) }}">
                {{ csrf_field() }}

                {{ method_field('PUT') }}

                <div>
                    <label for="intitule">Nom du compte</label>

                    <div>
                        <input id="intitule" name="intitule" placeholder="Nom du compte"
                            value="{{ old('intitule', $transaction->intitule) }}">
                    </div>
                    @error('intitule')
                    <p>Le nom du compte est incorrect</p>
                    @enderror

                </div>
                <div>
                    <div>
                        <button type="submit">
                            Enregistrer
                        </button>
                        <a href="{{ route('compte.index') }}">Retour à la liste</a>
                    </div>
                    <form action="{{ route('compte.destroy', $compte->id) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit">Supprimer</button>
                    </form>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection