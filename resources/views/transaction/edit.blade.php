@extends('layouts.app')

@section('content')
    <div>
        <div>
            <div>
               <?php

              

               ?>
                

                
                <form action="{{ route('transaction.update', ['id' => $compte, 'id_transaction' => $transaction]) }}"
                    method="POST">
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
                            <input type="number" step="0.01" id="montant" name="montant"
                                placeholder="Montant de la transaction"
                                value="{{ old('montant', $transaction->montant) }}">
                        </div>
                        @error('montant')
                            <p>Le montant de la transaction est incorrect</p>
                        @enderror

                    </div>
                    <div>
                        <label>Sens de la transaction : </label>
                        <div>
                            <select name="sens_transaction">
                                <option {{ $transaction->sens_transaction == 'entrant' ? 'selected' : '' }} value="entrant">Entrant</option>
                                <option {{ $transaction->sens_transaction == 'sortant' ? 'selected' : '' }} value="sortant">Sortant</option>

                                
                            </select>
                        </div>
                        @error('sens_transaction')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label>Categorie : </label>
                        <div>
                            <select name="id_categorie">
                                @foreach ($categories as $categorie)
                                    <option  {{ $transaction->id_categorie == $categorie->id ? 'selected' : '' }}  value="{{ $categorie->id }}">
                                        {{ $categorie->intitule }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div>
                        <div>
                            <button type="submit">
                                Enregistrer
                            </button>
                            <a href="{{ route('compte.dashboard', $compte->id)  }}">Retour à la liste</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
