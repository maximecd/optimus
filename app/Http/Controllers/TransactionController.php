<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Http\Requests\TransactionRequest;
use App\Models\Categorie;
use App\Models\User;
use App\Models\Compte;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::all();
        return view('transaction/index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();
        $users = User::all();
        $comptes = Compte::all();

        return view('transaction/create', compact('categories', 'users', 'comptes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionRequest  $request, Transaction $transaction)
    {
        $transaction->intitule = $request->intitule;
        $transaction->description = $request->description;
        $transaction->montant = $request->montant;
        $transaction->sens_transaction = $request->sens_transaction;
        $transaction->id_compte = $request->id_compte;
        $transaction->id_user = Auth::id();
        $transaction->id_categorie = $request->id_categorie;
        $transaction->save();
        return redirect()->route('transaction.index')->with('info', 'La transaction ' . $transaction->intitule . ' a été créée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        return view('transaction/show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        $categories = Categorie::all();
        return view('transaction/edit', compact('transaction', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionRequest $request, Transaction $transaction)
    {
        $transaction->update($request->all());
        return redirect()->route('transaction.index')->with('info', 'La transaction a bien été modifiée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transaction.index')->with('info', 'La transaction a bien été suprimée');
    }
}
