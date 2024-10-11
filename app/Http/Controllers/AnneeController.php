<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annee;

class AnneeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
    }

    public function annee_active($id)
    {
        //on desactive l'année scolaire qui a pour status 1
        $desactivation_annee = Annee::where('status',1)->update(['status' => 0]);
        //on active l'année scolaire selectionner par l'utilisateur

        $activation_annee = Annee::where('id',$id)->update(['status' => 1]);

        $annee_scolaire = Annee::where('id',$id)->first();

        alert('Bienvenue','Dans l\'année '.$annee_scolaire->annee.'.','success')->addImage('/assets/asset_principal/img_sweat_alert/user.png')->timerProgressBar();
        return redirect()->route('home');
    }
}
