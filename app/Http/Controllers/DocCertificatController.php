<?php

namespace App\Http\Controllers;

use App\Models\DocCertificat;
use Illuminate\Http\Request;

class DocCertificatController extends Controller
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
        DocCertificat::create([
            'copie' => $request->copie,
            'num_copie' => $request->num_copie,
            'date_copie' => $request->date_copie,
            'certificat_nationalites_id' => $request->nationnalite_id
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
        DocCertificat::where('id',$id)->update([
                                                  'copie' => $request->copie,
                                                  'num_copie' => $request->num_copie,
                                                  'date_copie' => $request->date_copie
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
       DocCertificat::where('id',$id)->delete();

       return back();
    }
}
