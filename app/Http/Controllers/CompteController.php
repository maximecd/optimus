<?php

namespace App\Http\Controllers;

use App\Models\Compte;
use Illuminate\Http\Request;
use App\Http\Requests\CompteRequest;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class CompteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        
        $comptes = Compte::where('id_admin',Auth::id())->get();
        return view('compte/index', compact('comptes'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('compte/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompteRequest  $request, Compte $compte)
{
    $compte->intitule=$request->intitule;
    $compte->id_admin=$request=Auth::id();
    $compte->save();
    return redirect()->route('compte.index')->with('info','Le compte ' . $compte->intitule . ' a été créé');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Compte $compte)
{
    $transactions = Transaction::where('id_compte', $compte->id)->get();
    return view('compte/dashboard', compact('compte','transactions'));
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Compte $trancomptesaction) {
        return view('compte/edit', compact('compte'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompteRequest $request, Compte $compte) {
        $compte->update($request->all());
        return redirect()->route('compte.index')->with('info', 'Le compte a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compte $compte) {
        $compte->delete();
        return redirect()->route('compte.index')->with('info', 'Le compte a bien été suprimé');
    }
}
