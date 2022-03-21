
@if(session()->has('info'))
<div class="notification is-success">
    {{ session('info') }}
</div>
@endif

<div class="card" style="width:100%">
    <header class="card-header">
        <p class="card-header-title">Transactions</p>
        <a class="button is-info" href="{{ route('transaction.create') }}">Créer une transaction</a>
    </header>
    <div class="card-content">


            <table class="table is-hoverable" >
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Intitule de la transaction</th>
                        <th>Description</th>
                        <th>Montant</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td><strong>{{ $transaction->intitule }}</strong></td>
                        <td><strong>{{ $transaction->description }}</strong></td>
                        <td><strong>{{ $transaction->montant }}</strong></td>
                        <td><a class="button is-primary" href="{{ route('transaction.show', $transaction->id) }}">Voir</a></td>
                        <td><a class="button is-warning" href="{{ route('transaction.edit', $transaction->id) }}">Modifier</a></td>
                        <td>
                            <form action="{{ route('transaction.destroy', $transaction->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="button is-danger" type="submit">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

    </div>
    <footer class="card-footer">

    </footer>
</div>
