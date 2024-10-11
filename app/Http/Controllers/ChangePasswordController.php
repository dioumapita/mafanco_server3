<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annee;
use App\Models\User;
use App\Rules\VerifyCurrentPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class ChangePasswordController extends Controller
{
    //
    public function create()
    {
        //on récupère le chemin du thème actif

        return view('pages.changepassword.change_password');
    }

    public function store(Request $request)
    {
        /**
         * lors de la validation du mot de passe courant on verifit avec le role
         * verfifyCurrrentPassword si le mot de passe courant de l'utilisateur
         * est valide
         */
        $request->validate([
            'password_courant' => ['required',new VerifyCurrentPassword],
            'new_password' => ['required','string','min:8'],
            'confirm_new_password' => ['same:new_password']
        ]);
        /**
         * si toutes les informations saisi par l'utilisateur sont
         * valide on met à jour son mot de passe et on lui deconnecte
         * et on lui redirige vers la page de connexion
         */
        $update_password_user = User::where('id',Auth::id())->update([
            'vue_password' => $request->new_password,
            'password' => Hash::make($request->new_password)
        ]);
        Auth::logout();
        // Session::flash('message','Votre mot de passe a été changer avec succès');
        return  redirect('login')->with('message','Votre mot de passe a été changer avec succès');
    }
}
