<?php

namespace App\Http\Controllers;

use App\Models\Annee;
use App\Models\PlumitifCivil;
use Illuminate\Http\Request;

class PlumitifCivilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $all_annees = Annee::all();
        $annee_courante = Annee::where('status',1)->first();

        return view('pages.plumitif_civil.index',compact('all_annees','annee_courante'));
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

        $plumitif = PlumitifCivil::where('id',$id)->first();
        $all_annees = Annee::all();
        $annee_courante = Annee::where('status',1)->first();

        return view('pages.plumitif_civil.show',compact('plumitif','all_annees','annee_courante'));
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
        PlumitifCivil::where('id',$id)->update([
            'numero' => $request->numero,
            'date' => $request->date,
            'objet' => $request->objet,
            'affaire' => $request->affaire,
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
        //
    }

    public function liste_plumitif()
    {
        $all_annees = Annee::all();
        $annee_courante = Annee::where('status',1)->first();
        return view('pages.plumitif_civil.liste_p_civil',compact('all_annees','annee_courante'));
    }
}
