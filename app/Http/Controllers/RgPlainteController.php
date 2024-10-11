<?php

namespace App\Http\Controllers;

use App\Models\Accuse;
use App\Models\DocPlainte;
use Illuminate\Http\Request;
use App\Models\RgPlainte;
class RgPlainteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $all_plaintes = RgPlainte::all();

        return view('pages.rg_plaintes.index',compact('all_plaintes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('pages.rg_plaintes.create');
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
        $new_plainte = RgPlainte::create([
                                            'num' => $request->num,
                                            'date_plainte' => $request->date_plainte,
                                            'origine' => $request->origine,
                                            'infraction' => $request->infraction,
                                            'partie_civil' => $request->partie_civil,
                                            'orientation' => $request->orientation
                                         ]);

        /**
         * lié la plainte à l'accuse
         */
        $prenom_nom = $request->prenom_nom;
        $date_naiss = $request->date_naiss;
        $lieu_naiss = $request->lieu_naiss;
        $pere = $request->pere;
        $mere = $request->mere;
        $domicile = $request->domicile;


        foreach($prenom_nom as $key => $accuse)
        {
            $new_accuse = Accuse::create([
                                            'prenom_nom' => $accuse,
                                            'date_naiss' => $date_naiss[$key],
                                            'lieu_naiss' => $lieu_naiss[$key],
                                            'pere' => $pere[$key],
                                            'mere' => $mere[$key],
                                            'domicile' => $domicile[$key],
                                            'rg_plaintes_id' => $new_plainte->id
                                         ]);
        }

        /**
         * upload file plainte
         */
        if($request->file('doc_plainte') != null)
            {
                $extension = $request->file('doc_plainte')->getClientOriginalExtension();
                $name = time().'.'.$extension;
                $path =   $request->file('doc_plainte')->storeAs('doc_plainte',$name);

                $new_doc = DocPlainte::create([
                                                'nom_doc' => $name,
                                                'chemin_doc' => $path,
                                                'rg_plaintes_id' => $new_plainte->id
                                            ]);
            }

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

        $plainte = RgPlainte::where('id',$id)->first();


        return view('pages.rg_plaintes.show',compact('plainte'));
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
        $update = RgPlainte::where('id',$id)->update([
                                                        'num' => $request->num,
                                                        'date_plainte' => $request->date_plainte,
                                                        'origine' => $request->origine,
                                                        'infraction' => $request->infraction,
                                                        'partie_civil' => $request->partie_civil,
                                                        'orientation' => $request->orientation
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
        RgPlainte::where('id',$id)->delete();

        return redirect()->route('rg_plainte.index');
    }
}
