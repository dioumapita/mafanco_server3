<?php

namespace App\Http\Controllers;

use App\Models\scelle;
use Illuminate\Http\Request;

class ScelleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $all_scelles = scelle::all();

        return view('pages.scelles.index',compact('all_scelles'));
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
        $new_scelle = scelle::create([
                                        'num' => $request->num,
                                        'date_ajout' => $request->date_ajout,
                                        'affaire' => $request->affaire,
                                        'designation' => $request->designation,
                                        'infraction' => $request->infraction,
                                        'obs' => $request->obs
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
        $update_scelle = scelle::where('id',$id)->update([
                                                            'num' => $request->num,
                                                            'date_ajout' => $request->date_ajout,
                                                            'affaire' => $request->affaire,
                                                            'designation' => $request->designation,
                                                            'infraction' => $request->infraction,
                                                            'obs' => $request->obs,
                                                            'date_sortie' => $request->date_sortie
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

        scelle::where('id',$id)->delete();

        return back();
    }
}
