<?php

namespace App\Http\Controllers;

use App\Models\Inculpe;
use Illuminate\Http\Request;

class InculpeController extends Controller
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
        $new_inculpe = Inculpe::create([
                                            'prenom_nom' => $request->prenom_nom,
                                            'date_naiss' => $request->date_naiss,
                                            'lieu_naiss' => $request->lieu_naiss,
                                            'pere' => $request->pere,
                                            'mere' => $request->mere,
                                            'domicile' => $request->domicile,
                                            'rg_instructions_id' => $request->rg_instructions_id
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

        $update = Inculpe::where('id',$id)->update([
                                                    'prenom_nom' => $request->prenom_nom,
                                                    'date_naiss' => $request->date_naiss,
                                                    'lieu_naiss' => $request->lieu_naiss,
                                                    'pere' => $request->pere,
                                                    'mere' => $request->mere,
                                                    'domicile' => $request->domicile
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
       Inculpe::where('id',$id)->delete();

       return back();
    }
}
