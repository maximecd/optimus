<?php

namespace App\Http\Controllers;

use App\Models\Compte;
use Illuminate\Http\Request;
use App\Http\Requests\CompteRequest;
use App\Http\Requests\InviteRequest;
use App\Models\Categorie;
use App\Models\Invitation;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UtilisateurCompte;
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
        $comptes = Compte::where('id_admin', Auth::id())->get();
        $invitations = Invitation::where('id_invite', Auth::id())->get();
        foreach ($invitations as $invitation) {
            $invitation->compte = Compte::find($invitation->id_compte); 
            $invitation->admin_nom = User::find($invitation->compte->id_admin)->first_name;
            $invitation->admin_prenom = User::find($invitation->compte->id_admin)->name;
        }
        $comptesInv = UtilisateurCompte::where('id_user', Auth::id())->get();
        foreach ($comptesInv as $compteInv) {
            $compteInv->compte = Compte::find($compteInv->id_compte); 
        }
        return view('compte/index', compact('comptes', 'comptesInv', 'invitations'));
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
    public function store(CompteRequest $request, Compte $compte)
    {
        $compte->intitule = $request->intitule;
        $compte->id_admin = $request = Auth::id();
        $compte->save();
        return redirect()
            ->route('compte.index')
            ->with('info', 'Le compte ' . $compte->intitule . ' a été créé');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_compte)
    {
        require __DIR__ . '../../../Support/Solde.php';
        $compte = Compte::where('id', $id_compte)->firstOrFail();

        $transactions = Transaction::where('id_compte', $compte->id)->get();

        foreach ($transactions as $transaction) {
            $transaction->categorie = Categorie::find($transaction->id_categorie);
        }

        $solde = getSolde($transactions);
        $user = User::find($compte->id_admin);
        return view('compte/dashboard', compact('compte', 'transactions', 'solde', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_compte)

    {
        $compte = Compte::where('id', $id_compte)->firstOrFail();
        $inviteUsers = UtilisateurCompte::where('id_compte', $id_compte)->get();

        foreach ($inviteUsers as $inviteUser) {
            $inviteUser->user = User::find($inviteUser->id_user);
        }

        $user = User::find($compte->id_admin);

        return view('compte/edit', compact('compte','inviteUsers','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompteRequest $request, $id_compte)
    {
        $compte = Compte::where('id', $id_compte)->firstOrFail();
        $compte->update($request->all());
        return redirect()->route('compte.dashboard', $id_compte)->with('info', 'Les informations du compte ont bien été modifiés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_compte)
    {
        Compte::find($id_compte)->delete();

        return redirect()
            ->route('compte.index')
            ->with('info', 'Le compte a bien été suprimé');
    }

    public function invite(InviteRequest $request, $id_compte)
    {
        $compte = Compte::where('id', $id_compte)->firstOrFail();
        $inviteUser = User::where('email', $request->email)->first();

        //on vérifie si l'utilisateur existe
        if ($inviteUser == null) {
            return redirect()->route('compte.edit', $id_compte)->with('info', 'L\'utilisateur n\'existe pas');
        }
        //on vérifie si il a déjà invité
        $oldInvite = Invitation::where('id_compte', $id_compte)
            ->where('id_invite', $inviteUser->id)
            ->where('id_admin', Auth::id())
            ->first();

            if ($oldInvite != null) {
                return redirect()->route('compte.edit', $id_compte)->with('info', 'Vous ne pouvez pas réinviter cet utilisateur');
            }

        $invitation = new Invitation();
        // check if user already invited
        $invitation->id_compte = $id_compte;
        $invitation->id_admin = Auth::id();
        $invitation->id_invite = $inviteUser->id;

        $invitation->save();

        return redirect()->route('compte.dashboard', $id_compte)->with('info', 'L\'invitation a bien été envoyé');
    }

    public function declineInvite($id){
        Invitation::where('id_compte', $id)->where('id_invite', Auth::id())->delete();
        return redirect()->route('compte.index')->with('info', 'L\'invitation a bien été refusé');
    }

    public function acceptInvite($id){
        $invitation = Invitation::where('id_compte', $id)->where('id_invite', Auth::id())->first();
        UtilisateurCompte::create([
            'id_compte' => $invitation->id_compte,
            'id_user' => Auth::id(),
            'editeur' => true
        ]);

        Invitation::where('id_compte', $id)->where('id_invite', Auth::id())->delete();
        return redirect()->route('compte.index')->with('info', 'Vous avez bien accepté l\'invitation');
    }

    public function deleteUtilisateurInvite($id_compte, $id_user){
        UtilisateurCompte::where('id_compte', $id_compte)->where('id_user', $id_user)->delete();
        return redirect()->route('compte.dashboard', $id_compte)->with('info', 'Vous avez bien supprimé l\'utilisateur');
    }
}
