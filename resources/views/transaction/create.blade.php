@section('contenu')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Création d'une transaction</p>
        </header>
        <div class="card-content">
            <div class="content">
                <form action="{{ route('transaction.store') }}" method="POST">
                    @csrf

                    <div class="field">
                        <label class="label">Intitulé de la transaction</label>
                        <div class="control">
                            <input type="text" size="100" name="intitule" placeholder="intitulé de la transaction"
                                value="{{ old('intitule') }}">
                        </div>
                        @error('intitule')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="field">
                        <label class="label">Description de la transaction</label>
                        <div class="control">
                            <input type="text" size="100" name="description" placeholder="Description de la transaction"
                                value="{{ old('description') }}">
                        </div>
                        @error('description')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="label">Montant de la transaction</label>
                        <div class="control">
                            <input type="text" size="100" name="montant" placeholder="Montant de la transaction"
                                value="{{ old('montant') }}">
                        </div>
                        @error('montant')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <div class="control">
                            <button class="button is-link">Envoyer</button>

                            <a class="button is-info" href="{{ route('transaction.index') }}">Retour à la liste</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
