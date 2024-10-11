<?php

namespace App\Http\Controllers;

use App\Events\CreationDossier;
use App\Mail\DemoMailMarkdown;
use App\Models\DossierAffaireCivil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Mediumart\Orange\SMS\SMS;
use Mediumart\Orange\SMS\Http\SMSClient;

class DossierAffaireCivilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

       // event(new CreationDossier());

        $all_dossiers = DossierAffaireCivil::all();

        return view('pages.dossier_affaire_civile.index',compact('all_dossiers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //



        return view('pages.dossier_affaire_civile.create');
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

        // $client = SMSClient::getInstance('T69uOGbBMyfhDepsG4PFLL4AIC6KVPyE', '2usPK3yisG7lktTm');
        // $sms = new SMS($client);

        if(DossierAffaireCivil::where('num_rg',$request->num_rg)
                                ->where('objet',$request->objet)
                                ->where('demandeur',$request->demandeur)
                                ->where('defendeur',$request->defendeur)
                                ->exists()
                            )
        {

        }

        else
        {

                $new_dossier = DossierAffaireCivil::create([
                    'num_rg' => $request->num_rg,
                    'objet' => $request->objet,
                    'demandeur' => $request->demandeur,
                    'conseil_1' => $request->conseil_1,
                    'contact_1' => $request->contact_1,
                    'defendeur' => $request->defendeur,
                    'conseil_2' => $request->conseil_2,
                    'contact_2' => $request->contact_2
                ]);
        }


         /**
         * envoi de sms
         */
        // $nums = [$request->contact_1,$request->contact_2];

        // foreach($nums as $num)
        //     {
        //         $sms->message('Le dossier '.$request->objet. ' est enregistre sous le numéro: N° RG '.$request->num_rg.' avec succès au tribunal de Dixinn.')
        //             ->from('+224623897708')
        //             ->to('+224'.$num)
        //             ->send();
        //     }
        // if(!$sock = @fsockopen('www.google.com', 80))
        //     {

        //     }
        // else{
        //         Mail::to('istounkara224@gmail.com')
        //         ->cc(
        //                 ['elhadjdiouma@gmail.com','mohameddiakite43@gmail.com']
        //             )
        //         ->send(new DemoMailMarkdown($request->demandeur,$request->defendeur,$request->objet,$request->num_rg));
        //     }

        return redirect()->route('dossier_affaire_civil.index');
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

        $dossier = DossierAffaireCivil::where('id',$id)->first();

        return view('pages.dossier_affaire_civile.show',compact('dossier'));
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

        DossierAffaireCivil::where('id',$id)->delete();

        return redirect()->route('dossier_affaire_civil.index');
    }
}
