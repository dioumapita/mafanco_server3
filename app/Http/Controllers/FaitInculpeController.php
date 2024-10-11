<?php

namespace App\Http\Controllers;

use App\Models\FaitInculpe;
use Illuminate\Http\Request;

class FaitInculpeController extends Controller
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
        $new_fait = FaitInculpe::create([
                                            'date_faits' => $request->date_faits,
                                            'nature_faits' => $request->nature_faits,
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
       $update = FaitInculpe::where('id',$id)->update([
                                                        'date_faits' => $request->date_faits,
                                                        'nature_faits' => $request->nature_faits,
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

        FaitInculpe::where('id',$id)->delete();

        return back();
    }
}
