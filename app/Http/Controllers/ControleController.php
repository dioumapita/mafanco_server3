<?php

namespace App\Http\Controllers;

use App\Imports\ControleImport;
use App\Imports\ListeControlerImport;
use App\Models\Controle;
use App\Models\ListeControler;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ControleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $all_candidats = Controle::all();

        return view('pages.controle.index',compact('all_candidats'));
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

        Excel::import(new ControleImport,$request->file('base_file'));


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

    public function store_liste_controler(Request $request)
    {

        Excel::import(new ListeControlerImport,$request->liste_candidat);

        return back();
    }


    public function candidat_trouver()
    {
        $all_candidats = ListeControler::where('status',1)->get();

        return view('pages.controle.candidat_trouver',compact('all_candidats'));
    }

    public function candidat_non_trouver()
    {
        $all_candidats = ListeControler::where('status',0)->get();

        return view('pages.controle.candidat_non_trouver',compact('all_candidats'));
    }

    public function remove_controle()
    {
        Controle::where('id','>',0)->delete();
        ListeControler::where('id','>',0)->delete();

        return back();
    }
}
