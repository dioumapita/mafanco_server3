<?php

namespace App\Http\Controllers;

use App\Models\DossierFlagrantDelit;
use Illuminate\Http\Request;
use Mediumart\Orange\SMS\SMS;
use Mediumart\Orange\SMS\Http\SMSClient;

class DossierFlagrantDelitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $all_dossiers = DossierFlagrantDelit::all();

        return view('pages.dossier_flagrant_delit.index',compact('all_dossiers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('pages.dossier_flagrant_delit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = SMSClient::getInstance('T69uOGbBMyfhDepsG4PFLL4AIC6KVPyE', '2usPK3yisG7lktTm');
        $sms = new SMS($client);
        //
        $new_dossier = DossierFlagrantDelit::create([
                                                       'num_rp' => $request->num_rp,
                                                       'pr_contre' => $request->pr_contre,
                                                       'detention' => $request->detention,
                                                       'conseil' => $request->conseil,
                                                       'contact' => $request->contact,
                                                       'prevention' => $request->prevention,
                                                       'plaignant' => $request->plaignant
                                                    ]);

        $sms->message('Le dossier du procureur de la réplublique contre '.$request->pr_contre.' et le plaignant ou victime '.$request->plaignant.' est enregistre sous le numéro: N° RP '.$request->num_rp.' avec succès au tribunal de Dixinn.')
            ->from('+224623897708')
            ->to('+224'.$request->contact)
            ->send();

        return redirect()->route('dossier_flagrant_delit.index');
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
        DossierFlagrantDelit::where('id',$id)->delete();

        return back();
    }
}
