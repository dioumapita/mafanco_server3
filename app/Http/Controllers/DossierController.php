<?php

namespace App\Http\Controllers;

use App\Models\Dossier;
use Illuminate\Http\Request;
use Mediumart\Orange\SMS\SMS;
use Mediumart\Orange\SMS\Http\SMSClient;

class DossierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $all_dossiers =     Dossier::all();


        return view('pages.dossier.index',compact('all_dossiers'));
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
        $client = SMSClient::getInstance('T69uOGbBMyfhDepsG4PFLL4AIC6KVPyE', '2usPK3yisG7lktTm');
        $sms = new SMS($client);

        $new_dossier = Dossier::create([
                                          'nom_dossier' => $request->nom_dossier,
                                          'proprietaire' => $request->proprietaire,
                                          'contact' => $request->contact,
                                          'date_ajout' => $request->date_ajout
                                      ]);

        /**
         * envoi de sms
         */

        $sms->message('Votre dossier à été crée avec succès au tribunal de dixinn .')
            ->from('+224623897708')
            ->to('+224'.$request->contact)
            ->send();


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

        $dossier = Dossier::where('id',$id)->first();

        $n = 1;

        return view('pages.dossier.show',compact('dossier','n'));
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
        Dossier::where('id',$id)->update([
                                            'nom_dossier' => $request->nom_dossier,
                                            'proprietaire' => $request->proprietaire,
                                            'contact' => $request->contact,
                                            'date_ajout' => $request->date_ajout
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
        Dossier::where('id',$id)->delete();

        return back();
    }
}
