@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
<p>Test</p>
<table class="table is-hoverable">
    <thead>
        <tr>
            <th>#</th>
            <th>Comptes</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($comptes as $compte)
        <tr>
            <td>{{ $compte->id }}</td>
            <td><strong>{{ $compte->intitule }}</strong></td>
            <td><a class="button is-primary" href="{{ route('compte.show', $compte->id) }}">Voir</a></td>
            <td><a class="button is-warning" href="{{ route('compte.edit', $compte->id) }}">Modifier</a></td>
            <td>
                <form action="{{ route('compte.destroy', $compte->id) }}" method="post">
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
@endsection