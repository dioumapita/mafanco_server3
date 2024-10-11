<?php

namespace App\Http\Controllers;

use App\Models\GestionSignateur;
use Illuminate\Http\Request;

class GestionSignateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $all_signateurs = GestionSignateur::all();
        $i = 1;

        return view('pages.signateur.index',compact('all_signateurs','i'));
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
        GestionSignateur::create([
                                    'nom_signateur' => $request->nom_signateur,
                                    'sexe' => $request->sexe,
                                    'fonction' => $request->fonction,
                                    'status' => $request->status
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
        GestionSignateur::where('id',$id)->update([
                                                    'nom_signateur' => $request->nom_signateur,
                                                    'sexe' => $request->sexe,
                                                    'fonction' => $request->fonction,
                                                    'status' => $request->status
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
        GestionSignateur::where('id',$id)->delete();

        return back();
    }
}
