<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class CompteUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $all_users = Role::where('name','Utilisateur')->first()->users;
        $i = 1;

        return view('pages.compte_user.index',compact('all_users','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         /**
         * pour créer le username on récupère un caractère du nom,du prenom
         * et on fait une concatenation à la valeur ci-desous
         */
        $caractere_nom = Str::substr($request->nom,0,1);
        $caractere_prenom = Str::substr($request->prenom,0,1);

        $id_last_user = DB::table('users')->latest('id')->first()->id;
        $valeur2 = 1+$id_last_user;
        $valeur = 1111+$id_last_user;
        $email = 'tpidixinn'.$valeur2.'@gmail.com';

       $new_compte = User::create([
                                     'nom' => $request->nom,
                                     'prenom' => $request->prenom,
                                     'email' => $email,
                                     'username' => 'UTD'.$caractere_nom.$caractere_prenom.$valeur,
                                     'password' => Hash::make($request->password),
                                     'vue_password' => $request->password
                                  ]);
        /**
         * on assign un role utilisateur
         */

        $new_compte->assignRole('Utilisateur');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
       User::where('id',$id)->delete();

       return back();
    }
}
