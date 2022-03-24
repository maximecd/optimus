@extends('layouts.app')

@section('content')


<div class="card">
    <header class="card-header">
        <p class="card-header-title">Création d'un album</p>
    </header>
    <div class="card-content">
        <div class="content">
            <form action="{{ route('album.store') }}" method="POST">
                @csrf

                <div class="field">
                    <div class="select is-multiple">
                        <select name="perss[]" multiple>
                            @foreach($comptes as $compte)
                            <option value="{{ $compte->id }}" {{ in_array($compte->id, old('perss') ?: []) ? 'selected'
                                : '' }}>{{ $personnage->nompers }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                @error('perss')
                <p class="help is-danger">{{$message}}</p>
                @enderror
                <div class="field">
                    <label class="label">Nom de l'album'</label>
                    <div class="control">
                        <input type="text" size="100" name="titrealb" placeholder="Titre de l'album"
                            value="{{ old('titrealb') }}">
                    </div>
                    @error('titrealb')
                    <p class="help is-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="field">
                    <label class="label">Date de l'album</label>
                    <div class="control">
                        <input class="input" type="number" name="datealb" value="{{ old('datealb') }}">
                    </div>
                    @error('datealb')
                    <p class="help is-danger">L'année de l'album est est comprise entre 1940 et 1970</p>
                    @enderror
                </div>

                <div class="field">
                    <div class="control">
                        <button class="button is-link">Envoyer</button>

                        <a class="button is-info" href="{{ route('album.index') }}">Retour à la liste</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection