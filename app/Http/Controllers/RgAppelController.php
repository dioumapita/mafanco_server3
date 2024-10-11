<?php

namespace App\Http\Controllers;

use App\Models\DocAppel;
use App\Models\RgAppel;
use Illuminate\Http\Request;

class RgAppelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $all_appels = RgAppel::all();

        return view('pages.rg_appels.index',compact('all_appels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('pages.rg_appels.create');
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
        $new_appel = RgAppel::create([
                                        'num' => $request->num,
                                        'date_appel' => $request->date_appel,
                                        'appelant' => $request->appelant,
                                        'contact_1' => $request->contact_1,
                                        'defendeur' => $request->defendeur,
                                        'contact_2' => $request->contact_2,
                                        'juge' => $request->juge,
                                        'etat' => $request->etat,
                                        'date_transmition' => $request->date_transmition
                                    ]);

        /**
         * upload file appel
         */
        if($request->file('doc_appel') != null)
            {
                $extension = $request->file('doc_appel')->getClientOriginalExtension();
                $name = time().'.'.$extension;
                $path =   $request->file('doc_appel')->storeAs('doc_appel',$name);

                $new_doc = DocAppel::create([
                                                'nom_doc' => $name,
                                                'chemin_doc' => $path,
                                                'rg_appels_id' => $new_appel->id
                                            ]);
            }

        return redirect()->route('rg_appel.show',$new_appel->id);
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

        $appel = RgAppel::where('id',$id)->first();

        return view('pages.rg_appels.show',compact('appel'));
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
        RgAppel::where('id',$id)->delete();

        return redirect()->route('rg_appel.index');
    }

    public function send_appel(Request $request,$id)
    {
        RgAppel::where('id',$id)->update([
                                            'etat' => 'Transmit',
                                            'date_transmition' => $request->date_transmition
                                         ]);

        return back();
    }

    public function revok_appel($id)
    {
        RgAppel::where('id',$id)->update([
                                            'etat' => 'Non Transmit',
                                            'date_transmition' => null
                                         ]);

        return back();
    }
}
