<?php

namespace App\Http\Controllers;

use App\Models\ActeInculpe;
use Illuminate\Http\Request;

class ActeInculpeController extends Controller
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
        $new_acte = ActeInculpe::create([
                                            'date_actes' => $request->date_actes,
                                            'nature_actes' => $request->nature_actes,
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
        $update = ActeInculpe::where('id',$id)->update([
                                                        'date_actes' => $request->date_actes,
                                                        'nature_actes' => $request->nature_actes,
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

        ActeInculpe::where('id',$id)->delete();

        return back();
    }
}
