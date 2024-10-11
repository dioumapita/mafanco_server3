<?php

namespace App\Http\Controllers;

use App\Models\Annee;
use App\Models\Requette;
use Illuminate\Http\Request;

class RequetteController extends Controller
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

        return view('pages.requette.index',compact('all_annees','annee_courante'));
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

        $requette = Requette::where('id',$id)->first();
        $all_annees = Annee::all();
        $annee_courante = Annee::where('status',1)->first();

        return view('pages.requette.show',compact('requette','all_annees','annee_courante'));
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

        Requette::where('id',$id)->update([
                                            'numero' => $request->numero,
                                            'date_requette' => $request->date_requette,
                                            'requerant' => $request->requerant,
                                            'objet' => $request->objet
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

    public function liste_requette()
    {
        $all_annees = Annee::all();
        $annee_courante = Annee::where('status',1)->first();

        return view('pages.requette.liste_requette',compact('all_annees','annee_courante'));
    }
}
