    @section('contenu')
        <div class="card">
            <header class="card-header">
                <p class="card-header-title"><strong>Intitulé de la transaction</strong> : {{ $transaction->intitule }}</p>
            </header>
            <div class="card-content">
                <div class="content">
                    <p>Description de la transaction : {{ $transaction->description }}</p>
                    <p>Montant de la transaction : {{ $transaction->montant }}</p>

                </div>
            </div>
            <footer class="card-footer is-centered">
                <a class="button is-info" href="{{ route('transaction.index') }}">Retour à la liste</a>
            </footer>
        </div>
    @endsection
