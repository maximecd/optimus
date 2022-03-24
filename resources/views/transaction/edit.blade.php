@extends('layouts.app')

@section('content')
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
@endsection
