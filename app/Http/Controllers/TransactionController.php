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
    public function create($id_compte)
    {
        $categories = Categorie::all();
        return view('transaction/create', compact('categories', 'id_compte'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id_compte, TransactionRequest $request, Transaction $transaction)
    {
        $transaction->intitule = $request->intitule;
        $transaction->description = $request->description;
        $transaction->montant = $request->montant;
        $transaction->sens_transaction = $request->sens_transaction;
        $transaction->date = $request->date;
        $transaction->id_compte = $id_compte;
        $transaction->id_user = Auth::id();
        $transaction->id_categorie = $request->id_categorie;
        $transaction->save();
        return redirect()->route('compte.dashboard', $id_compte)->with('info', 'La transaction ' . $transaction->intitule . ' a été créée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_compte, $id_transaction)
    {
        $transaction = Transaction::find($id_transaction);
        $categorie = Categorie::find($transaction->id_categorie);
        return view('transaction/show', compact('transaction', 'id_compte', 'categorie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_compte, $id_transaction)
    {
        $categories = Categorie::all();
        $transaction = Transaction::find($id_transaction);
        $compte = Compte::find($id_compte);
        return view('transaction/edit', compact('transaction', 'categories', 'compte'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id_compte, $id_transaction, TransactionRequest $request)
    {
        $transaction = Transaction::find($id_transaction);
        $transaction->update($request->all());


        return redirect()->route('compte.dashboard', $id_compte)->with('info', 'La transaction a bien été modifiée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_compte, $id_transaction)
    {
        Transaction::find($id_transaction)->delete();
        return redirect()->route('compte.dashboard', $id_compte)->with('info', 'La transaction a bien été suprimée');
    }
}
