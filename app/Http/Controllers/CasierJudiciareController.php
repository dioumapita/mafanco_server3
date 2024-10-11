<?php

namespace App\Http\Controllers;

use App\Models\CasierJudiciaire;
use App\Models\GestionSignateur;
use App\Models\GestionStatistique;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use MercurySeries\Flashy\Flashy;
use Illuminate\Support\Facades\DB;
use App\Models\Annee;

class CasierJudiciareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();

        if($user->hasRole('Administrateur'))
        {
            $annee = Annee::where('status',1)->first()->annee;
            $all_casiers = CasierJudiciaire::whereDate('created_at',now()->format('Y-m-d'))
                                            ->whereYear('created_at',$annee)
                                            ->get();
        }
        else
        {
            $annee = DB::table('annees')->latest('annee')->first()->annee;
            $all_casiers = CasierJudiciaire::whereDate('created_at',now()->format('Y-m-d'))
                                            ->where('users_id',Auth::user()->id)
                                            ->whereYear('created_at',$annee)
                                            ->get();
        }


        return view('pages.casier.index',compact('all_casiers','annee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(auth()->user()->hasPermissionTo('Crée un casier'))
        {

             return view('pages.casier.create');
        }
        else
        {
            return view('errors.403');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $annee_id = DB::table('annees')->latest('annee')->first()->id;
        //
        if(CasierJudiciaire::where('concerne',$request->concerne)->where('pere',$request->pere)
            ->where('mere',$request->mere)->where('date_naiss',$request->date_naiss)
            ->where('lieu',$request->lieu)->where('domicile',$request->domicile)
            ->where('etat_civil',$request->etat_civil)->where('profession',$request->profession)
            ->where('nationalite',$request->nationalite)->where('copie',$request->copie)
            ->where('num_copie',$request->num_copie)->where('date_copie',$request->date_copie)
            ->exists()
            )
            {
                $casier = CasierJudiciaire::where('concerne',$request->concerne)->where('pere',$request->pere)
                                            ->where('mere',$request->mere)->where('date_naiss',$request->date_naiss)
                                            ->where('lieu',$request->lieu)->where('domicile',$request->domicile)
                                            ->where('etat_civil',$request->etat_civil)->where('profession',$request->profession)
                                            ->where('nationalite',$request->nationalite)->where('copie',$request->copie)
                                            ->where('num_copie',$request->num_copie)->where('date_copie',$request->date_copie)
                                            ->first();

                return redirect()->route('casier_judiciare.show',$casier->id);
            }
        else{
                $num_casier = 89;

                $last_num = DB::table('casier_judiciaires')->latest('id')->first();

                if($last_num != null)
                {
                    $num_casier = $last_num->num_casier + 1;

                }
                else
                {
                    $num_casier = 89;
                }

                $new_casier = CasierJudiciaire::create([
                                                            'num_casier' => $num_casier,
                                                            'concerne' => $request->concerne,
                                                            'pere' => $request->pere,
                                                            'mere' => $request->mere,
                                                            'date_naiss' => $request->date_naiss,
                                                            'lieu' => $request->lieu,
                                                            'domicile' => $request->domicile,
                                                            'etat_civil' => $request->etat_civil,
                                                            'profession' => $request->profession,
                                                            'nationalite' => $request->nationalite,
                                                            'copie' => $request->copie,
                                                            'num_copie' => $request->num_copie,
                                                            'date_copie' => $request->date_copie,
                                                            'users_id' => Auth::user()->id,
                                                            'annee_id' => $annee_id
                                                        ]);

                QrCode::format('png')->generate(
                    $num_casier."\n".$request->concerne."\n".$request->pere."\n".$request->mere."\n".Carbon::parse($request->date_naiss)->format('d/m/Y')."\n".$request->lieu."\n".$request->domicile."\n".$request->etat_civil,
                    '../public/qrcodes/casier_judiciaire/'.$new_casier->id.'.png');

                Flashy::success('Le casier judiciaire est crée avec succès');

                return redirect()->route('casier_judiciare.show',$new_casier->id);
            }
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

        $casier = CasierJudiciaire::where('id',$id)->first();

        return view('pages.casier.show',compact('casier'));
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
        $casier = CasierJudiciaire::where('id',$id)->first();

        if(auth()->user()->hasPermissionTo('Modifier un casier'))
        {
            $user = Auth::user();
            if($user->hasRole('Administrateur'))
            {
                return view('pages.casier.edit',compact('casier'));
            }
            else
            {
                if(now()->isAfter($casier->expire_at))
                {
                    return view('errors.expiration');
                }
                else
                {
                    return view('pages.casier.edit',compact('casier'));
                }
            }
        }
        else
        {
            return view('errors.403');
        }
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

        $num_casier = CasierJudiciaire::where('id',$id)->first()->num_casier;

        QrCode::format('png')->generate(
            $num_casier."\n".$request->concerne."\n".$request->pere."\n".$request->mere."\n".Carbon::parse($request->date_naiss)->format('d/m/Y')."\n".$request->lieu."\n".$request->domicile."\n".$request->etat_civil,
            '../public/qrcodes/casier_judiciaire/'.$id.'.png');

        $update = CasierJudiciaire::where('id',$id)->update([
            'concerne' => $request->concerne,
            'pere' => $request->pere,
            'mere' => $request->mere,
            'date_naiss' => $request->date_naiss,
            'lieu' => $request->lieu,
            'domicile' => $request->domicile,
            'etat_civil' => $request->etat_civil,
            'profession' => $request->profession,
            'nationalite' => $request->nationalite,
            'copie' => $request->copie,
            'num_copie' => $request->num_copie,
            'date_copie' => $request->date_copie
        ]);

        Flashy::success('Le casier judiciaire a été modifier avec succès');


        return redirect()->route('casier_judiciare.show',$id);
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
        if(auth()->user()->hasPermissionTo('Supprimer un casier'))
        {
            CasierJudiciaire::where('id',$id)->delete();

            Flashy::success('Le casier judiciaire a été supprimer avec succès');

            return redirect()->route('casier_judiciare.index');

        }
        else
        {
            return view('errors.403');
        }
    }

    public function casier_par_mois(Request $request)
    {
        // $from = '2023-03-01';
        // $to = '2023-03-13';
        $user = Auth::user();
        $num_mois = $request->mois;
        $annee = Annee::where('status',1)->first()->annee;

        if($user->hasRole('Administrateur'))
        {
            $annee = Annee::where('status',1)->first()->annee;
            $all_casiers =     CasierJudiciaire::whereMonth('created_at',$num_mois)
                                                ->whereYear('created_at',$annee)
                                                ->get();
        }
        elseif($user->hasRole('Controle'))
        {
            $limit = GestionStatistique::where('libelle','CASIER')
            ->where('mois',$num_mois)
            ->whereYear('created_at',$annee)
            ->first()
            ->nbre;
            
            $all_casiers =     CasierJudiciaire::whereMonth('created_at',$num_mois)
                                                ->limit($limit)
                                                ->get();
        }
        else
        {
            $annee = DB::table('annees')->latest('annee')->first()->annee;
            $all_casiers =     CasierJudiciaire::whereMonth('created_at',$num_mois)
                                                ->where('users_id',Auth::user()->id)
                                                ->whereYear('created_at',$annee)
                                                ->get();
        }
        return view('pages.casier.casier_par_mois',compact('all_casiers','num_mois','annee'));
    }

    public function casier_par_jour(Request $request)
    {
        $user = Auth::user();
        if($user->hasRole('Administrateur'))
        {
            $annee = Annee::where('status',1)->first()->annee;
            $all_casiers =  CasierJudiciaire::whereDate('created_at',$request->date_choisie)
                                            ->whereYear('created_at',$annee)
                                            ->get();
        }
        else{
                $annee = DB::table('annees')->latest('annee')->first()->annee;

                $all_casiers =  CasierJudiciaire::whereDate('created_at',$request->date_choisie)
                                                ->where('users_id',Auth::user()->id)
                                                ->whereYear('created_at',$annee)
                                                ->get();
            }
        $date = Carbon::parse($request->date_choisie)->format('d/m/Y');


        return view('pages.casier.casier_par_jour',compact('all_casiers','date','annee'));
    }

    /**
     * Gestion des statisques des casiers par compte utilisateur
     */

    public function default_casier_user_jour()
    {

        $date = now()->format('Y-m-d');


        $all_casiers = CasierJudiciaire::groupBy('users_id')
                            ->selectRaw('count(id) as total,users_id')
                            ->whereDate('created_at',$date)
                            ->with('user')
                            ->get();

        $date =  Carbon::parse($date)->format('d/m/Y');


        $i = 1;

        return view('pages.casier.casier_user_jour',compact('all_casiers','i','date'));
    }

    public function show_casier_user_jour(Request $request)
    {
        $date = $request->date_choisie;


        $all_casiers = CasierJudiciaire::groupBy('users_id')
                            ->selectRaw('count(id) as total,users_id')
                            ->whereDate('created_at',$date)
                            ->with('user')
                            ->get();
        // dd($all_casiers);
        $date =  Carbon::parse($date)->format('d/m/Y');


        $i = 1;

        return view('pages.casier.casier_user_jour',compact('all_casiers','i','date'));
    }

    public function default_casier_user_mois()
    {

       $num_mois =  now()->month;

       $all_casiers = CasierJudiciaire::groupBy('users_id')
                            ->selectRaw('count(id) as total,users_id')
                            ->whereMonth('created_at',$num_mois)
                            ->with('user')
                            ->get();

        $i = 1;

        return view('pages.casier.casier_user_mois',compact('all_casiers','i','num_mois'));
    }

    public function show_casier_user_mois(Request $request)
    {
        $num_mois = $request->mois;

        $all_casiers = CasierJudiciaire::groupBy('users_id')
                            ->selectRaw('count(id) as total,users_id')
                            ->whereMonth('created_at',$num_mois)
                            ->with('user')
                            ->get();

        $i = 1;

        return view('pages.casier.casier_user_mois',compact('all_casiers','i','num_mois'));
    }

    public function renouvellement_casier(Request $request)
    {
        $annee_id = DB::table('annees')->latest('annee')->first()->id;

        $num_casier = 89;

        $last_num = DB::table('casier_judiciaires')->latest('id')->first();

        if($last_num != null)
        {
            $num_casier = $last_num->num_casier + 1;

        }
        else
        {
            $num_casier = 89;
        }

        $new_casier = CasierJudiciaire::create([
                                                    'num_casier' => $num_casier,
                                                    'concerne' => $request->concerne,
                                                    'pere' => $request->pere,
                                                    'mere' => $request->mere,
                                                    'date_naiss' => $request->date_naiss,
                                                    'lieu' => $request->lieu,
                                                    'domicile' => $request->domicile,
                                                    'etat_civil' => $request->etat_civil,
                                                    'profession' => $request->profession,
                                                    'nationalite' => $request->nationalite,
                                                    'copie' => $request->copie,
                                                    'num_copie' => $request->num_copie,
                                                    'date_copie' => $request->date_copie,
                                                    'users_id' => Auth::user()->id,
                                                    'annee_id' => $annee_id
                                                ]);

        QrCode::format('png')->generate(
            $num_casier."\n".$request->concerne."\n".$request->pere."\n".$request->mere."\n".Carbon::parse($request->date_naiss)->format('d/m/Y')."\n".$request->lieu."\n".$request->domicile."\n".$request->etat_civil,
            '../public/qrcodes/casier_judiciaire/'.$new_casier->id.'.png');

        Flashy::success('Le casier judiciaire est crée avec succès');

        return redirect()->route('casier_judiciare.show',$new_casier->id);
    }


}
