<x-app-layout>
    <div>
        <div>
            <div>
                <form method="POST" action="{{ route('transaction.update', $transaction->id) }}">
                    {{ csrf_field() }}

                    {{ method_field('PUT') }}

                    <div>
                        <label for="intitule">Intitule de la transaction</label>

                        <div>
                            <input id="intitule" name="intitule" placeholder="Intitule de la transaction"
                                value="{{ old('intitule', $transaction->intitule) }}">
                        </div>
                        @error('intitule')
                            <p>L'intitulé de la transaction est incorrect</p>
                        @enderror

                    </div>

                    <div>
                        <label for="description">Description de la transaction</label>

                        <div>
                            <input id="description" name="description" placeholder="Description de la transaction"
                                value="{{ old('description', $transaction->description) }}">
                        </div>
                        @error('description')
                            <p>La description de la transaction est incorrect</p>
                        @enderror

                    </div>

                    <div>
                        <label for="montant">Montant de la transaction</label>

                        <div>
                            <input id="montant" name="montant" placeholder="Montant de la transaction"
                                value="{{ old('montant', $transaction->montant) }}">
                        </div>
                        @error('montant')
                            <p>Le montant de la transaction est incorrect</p>
                        @enderror

                    </div>


                    <div>
                        <div>
                            <button type="submit">
                                Enregistrer
                            </button>
                            <a href="{{ route('transaction.index') }}">Retour à la liste</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
