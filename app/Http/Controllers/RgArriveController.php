<?php

namespace App\Http\Controllers;

use App\Models\DocRgArrive;
use App\Models\RgArrive;
use Illuminate\Http\Request;

class RgArriveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $all_rg_arrives = RgArrive::all();

        return view('pages.rg_arrives.index',compact('all_rg_arrives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('pages.rg_arrives.create');
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
        $new_arrive = RgArrive::create([
                                          'num' => $request->num,
                                          'date_ajout' => $request->date_ajout,
                                          'origine' => $request->origine,
                                          'objet' => $request->objet,
                                          'description' => $request->description
                                      ]);

         /**
         * upload file appel
         */
        if($request->file('doc_arrive') != null)
            {
                $extension = $request->file('doc_arrive')->getClientOriginalExtension();
                $name = time().'.'.$extension;
                $path =   $request->file('doc_arrive')->storeAs('doc_arrive',$name);

                $new_doc = DocRgArrive::create([
                                                'nom_doc' => $name,
                                                'chemin_doc' => $path,
                                                'rg_arrives_id' => $new_arrive->id
                                            ]);
            }

            return redirect()->route('rg_arrive.show',$new_arrive->id);
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

        $arrive = RgArrive::where('id',$id)->first();

        return view('pages.rg_arrives.show',compact('arrive'));
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

        RgArrive::where('id',$id)->delete();

        return redirect()->route('rg_arrive.index');
    }
}
