<?php

namespace App\Http\Controllers;

use App\Models\DocumentAffaireCivil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Mail\DemoMailMarkdown;
use App\Models\DossierAffaireCivil;
use Illuminate\Support\Facades\Mail;

class DocumentAffaireCivilController extends Controller
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
        $dossier = DossierAffaireCivil::where('id',$request->dossier_affaire_civils_id)->first();

        $name = $request->file('document')->getClientOriginalName();

        $path = $request->file('document')->store('doc_affaire_civil');

        $document = DocumentAffaireCivil::create([
                                                    'nom_doc' => $name,
                                                    'chemin_doc' => $path,
                                                    'dossier_affaire_civils_id' => $request->dossier_affaire_civils_id
                                                ]);

        // if(!$sock = @fsockopen('www.google.com', 80))
        //     {

        //     }
        // else{
        //         Mail::to('elhadjdiouma@gmail.com')
        //         ->cc(
        //                 ['istounkara224@gmail.com','mohameddiakite43@gmail.com']
        //             )
        //         ->send(new DemoMailMarkdown($dossier->demandeur,$dossier->defendeur,$dossier->objet,$dossier->num_rg));
        //     }

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
}
