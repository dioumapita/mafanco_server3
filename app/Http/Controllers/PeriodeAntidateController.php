<?php

namespace App\Http\Controllers;

use App\Models\PeriodeAntidate;
use Illuminate\Http\Request;

class PeriodeAntidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $all_periodes = PeriodeAntidate::all();


        return view('pages.periode_antidate.index',compact('all_periodes'));
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

        $new_periode = PeriodeAntidate::create([
                                                   'num_debut' => $request->num_debut,
                                                   'num_fin' => $request->num_fin,
                                                   'mois' => $request->mois,
                                                   'mouvement_debut' => $request->num_debut,
                                                   'mouvement_fin' => $request->num_fin
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

        $update = PeriodeAntidate::where('id',$id)->update([
                                                                'num_debut' => $request->num_debut,
                                                                'num_fin' => $request->num_fin,
                                                                'mois' => $request->mois,
                                                                'mouvement_debut' => $request->num_debut,
                                                                'mouvement_fin' => $request->num_fin
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
        PeriodeAntidate::where('id',$id)->delete();

        return back();
    }
}
