<?php

namespace App\Http\Controllers;

use App\Models\Appel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\Annee;
class AppelController extends Controller
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

        return view('pages.appel.index',compact('all_annees','annee_courante'));
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
        $appel = Appel::where('id',$id)->first();
        $all_annees = Annee::all();
        $annee_courante = Annee::where('status',1)->first();

        return view('pages.appel.show',compact('appel','all_annees','annee_courante'));
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
        $update = Appel::where('id',$id)->update([
                                                    'numero' => $request->numero,
                                                    'date_appel' => $request->date_appel,
                                                    'les_parties' => $request->les_parties,
                                                    'type' => $request->type,
                                                    'date_transmission' => $request->date_transmission
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

    public function liste_appel()
    {

        $all_annees = Annee::all();
        $annee_courante = Annee::where('status',1)->first();
        return view('pages.appel.liste_appel',compact('all_annees','annee_courante'));
    }
}
