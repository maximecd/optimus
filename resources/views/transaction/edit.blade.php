@section('contenu')
<div class="card">
    <header class="card-header">
        <p class="card-header-title">Modification d'une transaction</p>
    </header>
    <div class="card-content">
        <div class="content">
            <form class="form-horizontal" method="POST" action="{{ route('transaction.update', $transaction->id) }}">
                {{ csrf_field() }}

                {{ method_field('PUT') }}

                <div class="field">
                    <label for="intitule" class="label">Intitule de la transaction</label>

                    <div class="control">
                        <input  id="intitule" name="intitule" placeholder="Intitule de la transaction" value="{{ old('intitule',$transaction->intitule) }}">
                    </div>
                    @error('intitule')
                    <p class="help is-danger">L'intitulé de la transaction est incorrect</p>
                    @enderror

                </div>

                <div class="field">
                    <label for="description" class="label">Description de la transaction</label>

                    <div class="control">
                        <input  id="description" name="description" placeholder="Description de la transaction" value="{{ old('description',$transaction->description) }}">
                    </div>
                    @error('description')
                    <p class="help is-danger">La description de la transaction est incorrect</p>
                    @enderror

                </div>

                <div class="field">
                    <label for="montant" class="label">Montant de la transaction</label>

                    <div class="control">
                        <input  id="montant" name="montant" placeholder="Montant de la transaction" value="{{ old('montant',$transaction->montant) }}">
                    </div>
                    @error('montant')
                    <p class="help is-danger">Le montant de la transaction est incorrect</p>
                    @enderror

                </div>


                <div class="field">
                    <div class="control">
                        <button type="submit" class="button is-link">
                            Enregistrer
                        </button>
                        <a class="button is-info" href="{{ route('transaction.index') }}">Retour à la liste</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
