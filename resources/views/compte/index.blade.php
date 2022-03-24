@extends('layouts.app')

@section('content')

<a class="button is-info" href="{{ route('compte.create') }}">Créer un compte</a> <br><br>


@foreach($comptes as $compte)
<tr>
    <td> id : {{ $compte->id }}</td>
    <td> | <strong>{{ $compte->intitule }}</strong></td>
    </form>
    </td>
</tr>
@endforeach


</div>
<footer class="card-footer">

</footer>
</div>
@endsection