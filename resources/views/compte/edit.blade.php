<div class="card">
    <header class="card-header">
        <p class="card-header-title">Modification d'un album</p>
    </header>
    <div class="card-content">
        <div class="content">
            <form class="form-horizontal" method="POST" action="{{ route('compte.update', $compte->id) }}">
                {{ csrf_field() }}

                {{ method_field('PUT') }}


                <div class="field">
                    <div class="select is-multiple">
                        <select name="perss[]" multiple>
                            @foreach($comptes as $compte)
                            <option value="{{ $compte->id }}" {{ in_array($compte->id, old('perss') ?:
                                $album->personnages->pluck('id')->all()) ? 'selected' : '' }}>{{
                                $personnage->nompers }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="field">
                    <label for="titrealb" class="label">Titre de l'album</label>

                    <div class="control">
                        <input id="titrealb" name="titrealb" placeholder="Titre de l'album"
                            value="{{ old('titrealb',$album->titrealb) }}">
                    </div>
                    @error('titrealb')
                    <p class="help is-danger">Le titre de l'album est incorrect</p>
                    @enderror

                </div>
                <div class="field">
                    <label for="datealb" class="label">Date de l'album</label>
                    <div class="control">
                        <input id="datealb" type="text" name="datealb" value="{{ old('datealb',$album->datealb) }}"
                            required>
                    </div>
                    @error('datealb')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>

                <div class="field">
                    <div class="control">
                        <button type="submit" class="button is-link">
                            Enregistrer
                        </button>
                        <a class="button is-info" href="{{ route('/') }}">Retour à la liste</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>