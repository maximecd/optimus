<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Compte;
use App\Models\User;
use App\Models\UtilisateurCompte;
use Illuminate\Support\Facades\Auth;

class CheckAccountAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        // if user is logged in, continune. else, redirect to login page
        if (auth()->check()) {


            // if route is /compte/
            if ($request->is('compte/create')) {
                // skip
            }
            else if ($request->is('compte/*')) {

                $access = false;
                $compte = Compte::where('id', $request->route('id'))->first();
                $user = User::where('id', Auth::user()->id)->first();

                // vérifier le role de l'utilisateur
                if ($request->is('compte/*/edit')) {
                    if($compte->id_admin == $user->id){
                        $access = true;
                    }
                    else{
                        //redirect to compte page
                        return redirect()->route('compte.dashboard', $compte->id);
                    }
                }

                $utilisateurCompte = UtilisateurCompte::where('id_user', $user->id)->where('id_compte', $compte->id)->first();
                
                if ($compte != null && $compte->id_admin == $user->id) {
                    $access = true;
                }else if ($utilisateurCompte != null && $utilisateurCompte->id_user == $user->id) {
                    $access = true;
                }

             
                //if access true return request
                if ($access) {
                    return $next($request);
                }
                else{
                    // redirect to home page
                    return redirect('/');
                }

            }

            return $next($request);
        } else {

            return redirect('/login');
        }
    }

}
