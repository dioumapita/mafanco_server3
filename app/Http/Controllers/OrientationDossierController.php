<?php

namespace App\Http\Controllers;

use App\Models\OrientationDossier;
use Illuminate\Http\Request;

class OrientationDossierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $all_orientations = OrientationDossier::all();

        $n = 1;

        return view('pages.orientation_dossier.index',compact('all_orientations','n'));
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
        $new_orientation = OrientationDossier::create([
                                                        'lieu_orientation' => $request->lieu_orientation,
                                                        'date_orientation' => $request->date_orientation,
                                                        'dossier_affaire_civils_id' => $request->dossier_affaire_civils_id,
                                                        'status' => 1
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

    /**
     * remove orientation
     */

    public function remove_orientation($id)
    {
        OrientationDossier::where('dossier_affaire_civils_id',$id)->where('status',1)->first()->update([
                             'status' => 0
                          ]);

        return back();
    }
}
