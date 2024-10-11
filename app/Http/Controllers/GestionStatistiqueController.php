<?php

namespace App\Http\Controllers;

use App\Models\GestionStatistique;
use Illuminate\Http\Request;
use App\Models\Annee;

class GestionStatistiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $annee = Annee::where('status',1)->first()->annee;

        $all_statistiques = GestionStatistique::whereYear('created_at',$annee)
                                              ->get();
        $n = 1;

        return view('pages.statistique.index',compact('all_statistiques','n'));
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
        GestionStatistique::create([
                                      'libelle' => $request->libelle,
                                      'nbre' => $request->nbre,
                                      'mois' => $request->mois
                                   ]);

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
        GestionStatistique::where('id',$id)->update([
                                                        'libelle' => $request->libelle,
                                                        'nbre' => $request->nbre,
                                                        'mois' => $request->mois
                                                   ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        GestionStatistique::where('id',$id)->delete();

        return back();
    }
}
