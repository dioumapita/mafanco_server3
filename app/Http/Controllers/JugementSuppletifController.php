<?php

namespace App\Http\Controllers;

use App\Models\GestionSignateur;
use App\Models\GestionStatistique;
use App\Models\JugementSuppletif;
use App\Models\PeriodeAntidate;
use App\Models\PeriodeNormal;
use Illuminate\Http\Request;
use NumberFormatter;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Annee;

use Illuminate\Pagination\LengthAwarePaginator;

class JugementSuppletifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $from = Carbon::createFromFormat('d/m/Y','15/11/2023');
        // $to = Carbon::createFromFormat('d/m/Y','22/11/2023');

        // $all_jugements = JugementSuppletif::whereDate('created_at','2024-05-23')
        //                                   ->where('num',null)
        //                                   ->where('status',0)
        //                                   ->get();
        // dd($all_jugements);
        //  $num = 15798;
        // foreach($all_jugements as $jugement)
        // {
        //     JugementSuppletif::where('id',$jugement->id)->update([
        //                 'num' => $num
        //             ]);
        //     $num++;
        // }
        // dd("stop");
        // foreach($all_jugements as $jugement)
        // {
        //     JugementSuppletif::where('id',$jugement->id)->update([
        //         'president' => 'M. Ibrahima Sory 2 TOUNKARA'
        //     ]);
        // }
        // dd("stop");
        // JugementSuppletif::where('id','>',0)->update([
        //     'num' => null
        // ]);

        // dd("bonjour");


        $user = Auth::user();
        if($user->hasRole('Administrateur'))
        {
            $annee = Annee::where('status',1)->first()->annee;
            $all_jugement_suppletifs  = JugementSuppletif::whereDate('created_at',now()->format('Y-m-d'))
                                                          ->whereYear('created_at',$annee)
                                                           ->get();
            $convertisseur = new NumberFormatter("fr", NumberFormatter::SPELLOUT);
        }
        else
        {
            $annee = DB::table('annees')->latest('annee')->first()->annee;
            $all_jugement_suppletifs  = JugementSuppletif::whereDate('created_at',now()->format('Y-m-d'))
                                                            ->where('users_id',Auth::user()->id)
                                                            ->whereYear('created_at',$annee)
                                                            ->get();
            $convertisseur = new NumberFormatter("fr", NumberFormatter::SPELLOUT);
        }
        // dd($all_jugement_suppletifs);
        return view('pages.jugement_suppletif.index',compact('all_jugement_suppletifs','convertisseur','annee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $all_signateurs = GestionSignateur::all();

        if(auth()->user()->hasPermissionTo('Crée un jugement'))
        {

            return view('pages.jugement_suppletif.create',compact('all_signateurs'));
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

        if(JugementSuppletif::whereYear('created_at', '2024')->where('num_requette',$request->num_requette)->count() > 0)
        {
            return view('errors.doublons');
        }
        else
        {

        }

        if(JugementSuppletif::where('concerne',$request->concerne)->where('date_naiss',$request->date_naiss)
                            ->where('lieu_naiss',$request->lieu_naiss)->where('sexe',$request->sexe)
                            ->where('rang_naiss',$request->rang_naiss)->where('requerant',$request->requerant)
                            ->where('profession_requerant',$request->profession_requerant)->where('quartier_requerant',$request->quartier_requerant)
                            ->where('date_requete',$request->date_requete)->where('pere',$request->pere)
                            ->where('date_naiss_pere',$request->date_naiss_pere)->where('lieu_naiss_pere',$request->lieu_naiss_pere)
                            ->where('profession_pere',$request->profession_pere)->where('domicile_pere',$request->domicile_pere)->where('mere',$request->mere)
                            ->where('date_naiss_mere',$request->date_naiss_mere)->where('lieu_naiss_mere',$request->lieu_naiss_mere)
                            ->where('profession_mere',$request->profession_mere)->where('domicile_mere',$request->domicile_mere)
                            ->where('premier_temoin',$request->premier_temoin)->where('date_naiss_premier_temoin',$request->date_naiss_premier_temoin)
                            ->where('lieu_naiss_premier_temoin',$request->lieu_naiss_premier_temoin)->where('profession_premier_temoin',$request->profession_premier_temoin)
                            ->where('domicile_premier_temoin',$request->domicile_premier_temoin)->where('deuxieme_temoin',$request->deuxieme_temoin)
                            ->where('date_naiss_deuxieme_temoin',$request->date_naiss_deuxieme_temoin)->where('lieu_naiss_deuxieme_temoin',$request->lieu_naiss_deuxieme_temoin)
                            ->where('profession_deuxieme_temoin',$request->profession_deuxieme_temoin)->where('domicile_deuxieme_temoin',$request->domicile_deuxieme_temoin)
                            ->where('date_audience',$request->date_audience)->where('en_presence',$request->en_presence)
                            ->where('president',$request->president)->where('greffier',$request->greffier)
                            ->where('num_requette',$request->num_requette)->where('sexe_requerant',$request->sexe_requerant)
                            ->where('lieu_transcrit',$request->lieu_transcrit)->where('etat_civil',$request->etat_civil)
                            ->exists()
            )
            {
                    $new_jugement =  JugementSuppletif::where('concerne',$request->concerne)->where('date_naiss',$request->date_naiss)
                                                            ->where('lieu_naiss',$request->lieu_naiss)->where('sexe',$request->sexe)
                                                            ->where('rang_naiss',$request->rang_naiss)->where('requerant',$request->requerant)
                                                            ->where('profession_requerant',$request->profession_requerant)->where('quartier_requerant',$request->quartier_requerant)
                                                            ->where('date_requete',$request->date_requete)->where('pere',$request->pere)
                                                            ->where('date_naiss_pere',$request->date_naiss_pere)->where('lieu_naiss_pere',$request->lieu_naiss_pere)
                                                            ->where('profession_pere',$request->profession_pere)->where('domicile_pere',$request->domicile_pere)->where('mere',$request->mere)
                                                            ->where('date_naiss_mere',$request->date_naiss_mere)->where('lieu_naiss_mere',$request->lieu_naiss_mere)
                                                            ->where('profession_mere',$request->profession_mere)->where('domicile_mere',$request->domicile_mere)
                                                            ->where('premier_temoin',$request->premier_temoin)->where('date_naiss_premier_temoin',$request->date_naiss_premier_temoin)
                                                            ->where('lieu_naiss_premier_temoin',$request->lieu_naiss_premier_temoin)->where('profession_premier_temoin',$request->profession_premier_temoin)
                                                            ->where('domicile_premier_temoin',$request->domicile_premier_temoin)->where('deuxieme_temoin',$request->deuxieme_temoin)
                                                            ->where('date_naiss_deuxieme_temoin',$request->date_naiss_deuxieme_temoin)->where('lieu_naiss_deuxieme_temoin',$request->lieu_naiss_deuxieme_temoin)
                                                            ->where('profession_deuxieme_temoin',$request->profession_deuxieme_temoin)->where('domicile_deuxieme_temoin',$request->domicile_deuxieme_temoin)
                                                            ->where('date_audience',$request->date_audience)->where('en_presence',$request->en_presence)
                                                            ->where('president',$request->president)->where('greffier',$request->greffier)
                                                            ->where('num_requette',$request->num_requette)->where('sexe_requerant',$request->sexe_requerant)
                                                            ->where('lieu_transcrit',$request->lieu_transcrit)->where('etat_civil',$request->etat_civil)
                                                            ->first();

                    return  redirect()->route('jugement_suppletif.show',$new_jugement->id);
            }
            else{
                // dd("stop");
                    if($request->status == 0)
                    {
                        $date_audience = now();

                        $last_num = DB::table('jugement_suppletif')->whereYear('created_at',2024)->where('num','!=',null)->latest('id')->first();
                        $last_normal = DB::table('periode_normals')->latest('id')->first();
                        // dd($last_num);
                        if($last_num->num ?? null)
                        {
                            /**
                             * on contrôle est que le status de normal est à 0 ou 1
                             * pour pouvoir compter
                             */
                            if($last_normal != null)
                            {
                                if($last_normal->status == 0)
                                {
                                    $num_jugement = $last_normal->debut;
                                    PeriodeNormal::where('id',$last_normal->id)->update([
                                        'status' => 1
                                    ]);
                                }
                                else
                                {
                                    $num_jugement = $last_num->num + 1;
                                }
                            }
                            else
                            {
                                $num_jugement = $last_num->num + 1;
                            }
                            // $num_jugement = 41740;
                        }
                        else
                        {
                            $num_jugement = 31059;
                        }
                        $new_jugement = JugementSuppletif::create([
                            'num' => $num_jugement,
                            'concerne' => $request->concerne,
                            'date_naiss' => $request->date_naiss,
                            'lieu_naiss' => $request->lieu_naiss,
                            'sexe' => $request->sexe,
                            'rang_naiss' => $request->rang_naiss,
                            'requerant' => $request->requerant,
                            'profession_requerant' => $request->profession_requerant,
                            'quartier_requerant' => $request->quartier_requerant,
                            'date_requete' => $request->date_requete,
                            'pere' => $request->pere,
                            'date_naiss_pere' => $request->date_naiss_pere,
                            'lieu_naiss_pere' => $request->lieu_naiss_pere,
                            'profession_pere' => $request->profession_pere,
                            'domicile_pere' => $request->domicile_pere,
                            'mere' => $request->mere,
                            'date_naiss_mere' => $request->date_naiss_mere,
                            'lieu_naiss_mere' => $request->lieu_naiss_mere,
                            'profession_mere' => $request->profession_mere,
                            'domicile_mere' => $request->domicile_mere,
                            'premier_temoin' => $request->premier_temoin,
                            'date_naiss_premier_temoin' => $request->date_naiss_premier_temoin,
                            'lieu_naiss_premier_temoin' => $request->lieu_naiss_premier_temoin,
                            'profession_premier_temoin' => $request->profession_premier_temoin,
                            'domicile_premier_temoin' => $request->domicile_premier_temoin,
                            'sexe_premier_temoin' => $request->sexe_premier_temoin,
                            'deuxieme_temoin' => $request->deuxieme_temoin,
                            'date_naiss_deuxieme_temoin' => $request->date_naiss_deuxieme_temoin,
                            'lieu_naiss_deuxieme_temoin' => $request->lieu_naiss_deuxieme_temoin,
                            'profession_deuxieme_temoin' => $request->profession_deuxieme_temoin,
                            'domicile_deuxieme_temoin' => $request->domicile_deuxieme_temoin,
                            'sexe_deuxieme_temoin' => $request->sexe_deuxieme_temoin,
                            'date_audience' => $date_audience,
                            'en_presence' => $request->en_presence,
                            'president' => $request->president,
                            'greffier' => $request->greffier,
                            'telephone' => $request->telephone,
                            'rendez_vous' => $request->rendez_vous,
                            'num_requette' => $request->num_requette,
                            'sexe_requerant' => $request->sexe_requerant,
                            'lieu_transcrit' => $request->lieu_transcrit,
                            'etat_civil' => $request-> etat_civil,
                            'users_id' => Auth::user()->id,
                            'status' => $request->status,
                            'expire_at' =>  now()->addDays(3),
                            'annee_id' => $annee_id
                        ]);
                    }
                    else
                    {
                        $date_audience = $request->date_audience;

                        $periode =  PeriodeAntidate::latest()->first();

                        $num_jugement_anti = $periode->mouvement_debut;
                        // dd($num_jugement);
                        if($num_jugement_anti == $periode->num_fin)
                        {
                            return view('errors.limite');
                        }
                        else
                        {
                            $num_jugement_anti = $periode->mouvement_debut + 1;
                        }

                        $new_jugement = JugementSuppletif::create([
                            'num_anti' => $num_jugement_anti,
                            'concerne' => $request->concerne,
                            'date_naiss' => $request->date_naiss,
                            'lieu_naiss' => $request->lieu_naiss,
                            'sexe' => $request->sexe,
                            'rang_naiss' => $request->rang_naiss,
                            'requerant' => $request->requerant,
                            'profession_requerant' => $request->profession_requerant,
                            'quartier_requerant' => $request->quartier_requerant,
                            'date_requete' => $request->date_requete,
                            'pere' => $request->pere,
                            'date_naiss_pere' => $request->date_naiss_pere,
                            'lieu_naiss_pere' => $request->lieu_naiss_pere,
                            'profession_pere' => $request->profession_pere,
                            'domicile_pere' => $request->domicile_pere,
                            'mere' => $request->mere,
                            'date_naiss_mere' => $request->date_naiss_mere,
                            'lieu_naiss_mere' => $request->lieu_naiss_mere,
                            'profession_mere' => $request->profession_mere,
                            'domicile_mere' => $request->domicile_mere,
                            'premier_temoin' => $request->premier_temoin,
                            'sexe_premier_temoin' => $request->sexe_premier_temoin,
                            'date_naiss_premier_temoin' => $request->date_naiss_premier_temoin,
                            'lieu_naiss_premier_temoin' => $request->lieu_naiss_premier_temoin,
                            'profession_premier_temoin' => $request->profession_premier_temoin,
                            'domicile_premier_temoin' => $request->domicile_premier_temoin,
                            'deuxieme_temoin' => $request->deuxieme_temoin,
                            'sexe_deuxieme_temoin' => $request->sexe_deuxieme_temoin,
                            'date_naiss_deuxieme_temoin' => $request->date_naiss_deuxieme_temoin,
                            'lieu_naiss_deuxieme_temoin' => $request->lieu_naiss_deuxieme_temoin,
                            'profession_deuxieme_temoin' => $request->profession_deuxieme_temoin,
                            'domicile_deuxieme_temoin' => $request->domicile_deuxieme_temoin,
                            'date_audience' => $date_audience,
                            'en_presence' => $request->en_presence,
                            'president' => $request->president,
                            'greffier' => $request->greffier,
                            'telephone' => $request->telephone,
                            'rendez_vous' => $request->rendez_vous,
                            'num_requette' => $request->num_requette,
                            'sexe_requerant' => $request->sexe_requerant,
                            'lieu_transcrit' => $request->lieu_transcrit,
                            'etat_civil' => $request-> etat_civil,
                            'users_id' => Auth::user()->id,
                            'status' => $request->status,
                            'expire_at' =>  now()->addDays(3),
                            'annee_id' => $annee_id
                        ]);

                        $update_debut = PeriodeAntidate::where('id',$periode->id)
                                                       ->update([
                                                            'mouvement_debut' => $num_jugement_anti
                                                       ]);
                    }

                        QrCode::format('png')->generate(
                        $request->concerne."\n".Carbon::parse($request->date_naiss)->format('d/m/Y')."\n".$request->lieu_naiss."\n".$request->pere."\n".$request->mere,
                        '../public/qrcodes/jugement_suppletif/'.$new_jugement->id.'.png');
                        return  redirect()->route('jugement_suppletif.show',$new_jugement->id);
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
        $jugement = JugementSuppletif::where('id',$id)->first();
        $convertisseur = new NumberFormatter("fr", NumberFormatter::SPELLOUT);

        $info_president = GestionSignateur::where('nom_signateur',$jugement->president)->first();
        $info_greffier = GestionSignateur::where('nom_signateur',$jugement->greffier)->first();


        return view('pages.jugement_suppletif.show',compact('jugement','convertisseur','info_president','info_greffier'));
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
        $all_signateurs = GestionSignateur::all();

        if(auth()->user()->hasPermissionTo('Modifier un jugement'))
        {
            $jugement = JugementSuppletif::where('id',$id)->first();

            $user = Auth::user();
            if($user->hasRole('Administrateur'))
            {
                return view('pages.jugement_suppletif.edit',compact('jugement','all_signateurs'));
            }
            else
            {
                if(now()->isAfter($jugement->expire_at))
                {
                    return view('errors.expiration');
                }
                else
                {
                    return view('pages.jugement_suppletif.edit',compact('jugement','all_signateurs'));
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
        $user = Auth::user();
        //
        // dd($request->all());
        if($request->status == 0)
        {
            if($user->hasRole('Administrateur'))
            {
                JugementSuppletif::where('id',$id)->update([
                    'num' => $request->num,
                ]);
            }
            $update_jugement = JugementSuppletif::where('id',$id)->update([
                'concerne' => $request->concerne,
                'date_naiss' => $request->date_naiss,
                'lieu_naiss' => $request->lieu_naiss,
                'sexe' => $request->sexe,
                'rang_naiss' => $request->rang_naiss,
                'requerant' => $request->requerant,
                'profession_requerant' => $request->profession_requerant,
                'quartier_requerant' => $request->quartier_requerant,
                'date_requete' => $request->date_requete,
                'pere' => $request->pere,
                'date_naiss_pere' => $request->date_naiss_pere,
                'lieu_naiss_pere' => $request->lieu_naiss_pere,
                'profession_pere' => $request->profession_pere,
                'domicile_pere' => $request->domicile_pere,
                'mere' => $request->mere,
                'date_naiss_mere' => $request->date_naiss_mere,
                'lieu_naiss_mere' => $request->lieu_naiss_mere,
                'profession_mere' => $request->profession_mere,
                'domicile_mere' => $request->domicile_mere,
                'premier_temoin' => $request->premier_temoin,
                'sexe_premier_temoin' => $request->sexe_premier_temoin,
                'date_naiss_premier_temoin' => $request->date_naiss_premier_temoin,
                'lieu_naiss_premier_temoin' => $request->lieu_naiss_premier_temoin,
                'profession_premier_temoin' => $request->profession_premier_temoin,
                'domicile_premier_temoin' => $request->domicile_premier_temoin,
                'sexe_premier_temoin' => $request->sexe_premier_temoin,
                'deuxieme_temoin' => $request->deuxieme_temoin,
                'date_naiss_deuxieme_temoin' => $request->date_naiss_deuxieme_temoin,
                'lieu_naiss_deuxieme_temoin' => $request->lieu_naiss_deuxieme_temoin,
                'profession_deuxieme_temoin' => $request->profession_deuxieme_temoin,
                'domicile_deuxieme_temoin' => $request->domicile_deuxieme_temoin,
                'sexe_deuxieme_temoin' => $request->sexe_deuxieme_temoin,
                'sexe_deuxieme_temoin' => $request->sexe_deuxieme_temoin,
               //  'date_audience' => $request->date_audience,
                'en_presence' => $request->en_presence,
                'president' => $request->president,
                'greffier' => $request->greffier,
                'telephone' => $request->telephone,
                'rendez_vous' => $request->rendez_vous,
                'num_requette' => $request->num_requette,
                'sexe_requerant' => $request->sexe_requerant,
                'lieu_transcrit' => $request->lieu_transcrit,
                'etat_civil' => $request-> etat_civil,
                'type' => $request->type

           ]);
        }
        else
        {
            if($user->hasRole('Administrateur'))
            {
                JugementSuppletif::where('id',$id)->update([
                    'num_anti' => $request->num_anti,
                ]);
            }
            $update_jugement = JugementSuppletif::where('id',$id)->update([
                'concerne' => $request->concerne,
                'date_naiss' => $request->date_naiss,
                'lieu_naiss' => $request->lieu_naiss,
                'sexe' => $request->sexe,
                'rang_naiss' => $request->rang_naiss,
                'requerant' => $request->requerant,
                'profession_requerant' => $request->profession_requerant,
                'quartier_requerant' => $request->quartier_requerant,
                'date_requete' => $request->date_requete,
                'pere' => $request->pere,
                'date_naiss_pere' => $request->date_naiss_pere,
                'lieu_naiss_pere' => $request->lieu_naiss_pere,
                'profession_pere' => $request->profession_pere,
                'domicile_pere' => $request->domicile_pere,
                'mere' => $request->mere,
                'date_naiss_mere' => $request->date_naiss_mere,
                'lieu_naiss_mere' => $request->lieu_naiss_mere,
                'profession_mere' => $request->profession_mere,
                'domicile_mere' => $request->domicile_mere,
                'premier_temoin' => $request->premier_temoin,
                'date_naiss_premier_temoin' => $request->date_naiss_premier_temoin,
                'lieu_naiss_premier_temoin' => $request->lieu_naiss_premier_temoin,
                'profession_premier_temoin' => $request->profession_premier_temoin,
                'domicile_premier_temoin' => $request->domicile_premier_temoin,
                'sexe_premier_temoin' => $request->sexe_premier_temoin,
                'deuxieme_temoin' => $request->deuxieme_temoin,
                'date_naiss_deuxieme_temoin' => $request->date_naiss_deuxieme_temoin,
                'lieu_naiss_deuxieme_temoin' => $request->lieu_naiss_deuxieme_temoin,
                'profession_deuxieme_temoin' => $request->profession_deuxieme_temoin,
                'domicile_deuxieme_temoin' => $request->domicile_deuxieme_temoin,
                'sexe_deuxieme_temoin' => $request->sexe_deuxieme_temoin,
                'date_audience' => $request->date_audience,
                'en_presence' => $request->en_presence,
                'president' => $request->president,
                'greffier' => $request->greffier,
                'telephone' => $request->telephone,
                'rendez_vous' => $request->rendez_vous,
                'num_requette' => $request->num_requette,
                'sexe_requerant' => $request->sexe_requerant,
                'lieu_transcrit' => $request->lieu_transcrit,
                'etat_civil' => $request-> etat_civil,
                'type' => $request->type

           ]);
        }

        // dd($update_jugement);
        QrCode::format('png')->generate(
            $request->concerne."\n".Carbon::parse($request->date_naiss)->format('d/m/Y')."\n".$request->lieu_naiss."\n".$request->pere."\n".$request->mere,
            '../public/qrcodes/jugement_suppletif/'.$id.'.png');

        return  redirect()->route('jugement_suppletif.show',$id);
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
        if(auth()->user()->hasPermissionTo('Supprimer un jugement'))
        {
            JugementSuppletif::where('id',$id)->delete();

            return redirect()->route('jugement_suppletif.index');
        }
        else
        {
            return view('errors.403');
        }
    }

    /**
     * Jugement par mois
     */
    public function jugement_par_mois(Request $request)
    {
        $user = Auth::user();
        $num_mois = $request->mois;
        $annee = Annee::where('status',1)->first()->annee;
        
 
        if($user->hasRole('Administrateur'))
        {
            $annee = Annee::where('status',1)->first()->annee;
            $all_jugement_suppletifs  = JugementSuppletif::whereMonth('created_at',$num_mois)
                                            ->whereYear('created_at',$annee)
                                            ->get();
        }
        elseif($user->hasRole('Controle'))
        {
            $limit = GestionStatistique::where('libelle','JUGEMENT')
                                    ->where('mois',$num_mois)
                                    ->whereYear('created_at',$annee)
                                    ->first()->nbre;
            $annee = Annee::where('status',1)->first()->annee;
            $all_jugement_suppletifs  = JugementSuppletif::whereMonth('created_at',$num_mois)
                                        ->whereYear('created_at',$annee)
                                        ->limit($limit)
                                        ->get();
        }
        else
        {
            $annee = DB::table('annees')->latest('annee')->first()->annee;
            $all_jugement_suppletifs =  JugementSuppletif::whereMonth('created_at',$num_mois)
                                                ->where('users_id',Auth::user()->id)
                                                ->whereYear('created_at',$annee)
                                                ->get();
        }

        return view('pages.jugement_suppletif.jugement_par_mois',compact('all_jugement_suppletifs','num_mois','annee'));
    }

    /**
     * Jugement par jour
     */
    public function jugement_par_jour(Request $request)
    {
        $user = Auth::user();

        if($user->hasRole('Administrateur'))
        {
            $annee = Annee::where('status',1)->first()->annee;
            $all_jugement_suppletifs =  JugementSuppletif::whereDate('created_at',$request->date_choisie)
                                                        ->whereYear('created_at',$annee)
                                                        ->get();
        }
        else{
                $annee = DB::table('annees')->latest('annee')->first()->annee;
                    $all_jugement_suppletifs =  JugementSuppletif::whereDate('created_at',$request->date_choisie)
                                                    ->where('users_id',Auth::user()->id)
                                                    ->whereYear('created_at',$annee)
                                                    ->get();
            }
        $date = Carbon::parse($request->date_choisie)->format('d/m/Y');

        return view('pages.jugement_suppletif.jugement_par_jour',compact('all_jugement_suppletifs','date'));
    }

    public function default_jugement_user_jour()
    {
        $date = now()->format('Y-m-d');


        $all_jugement_suppletifs = JugementSuppletif::groupBy('users_id')
                                                    ->selectRaw('count(id) as total,users_id')
                                                    ->whereDate('created_at',$date)
                                                    ->where('status',0)
                                                    ->with('user')
                                                    ->get();
        $i = 1;
        $status = 0;

        $total_jugements = JugementSuppletif::whereDate('created_at',$date)->where('status',0)->get();
        $date =  Carbon::parse($date)->format('d/m/Y');

        return view('pages.jugement_suppletif.jugement_user_jour',compact('all_jugement_suppletifs','date','i','status','total_jugements'));
    }

    public function show_jugement_user_jour(Request $request)
    {
        $date = $request->date_choisie;

        $all_jugement_suppletifs = JugementSuppletif::groupBy('users_id')
                                        ->selectRaw('count(id) as total,users_id')
                                        ->whereDate('created_at',$date)
                                        ->where('status',$request->status)
                                        ->with('user')
                                        ->get();
        // dd($all_casiers);
        $i = 1;
        $status = $request->status;
        $total_jugements = JugementSuppletif::whereDate('created_at',$date)->where('status',$status)->get();
        $date =  Carbon::parse($date)->format('d/m/Y');

        return view('pages.jugement_suppletif.jugement_user_jour',compact('all_jugement_suppletifs','date','i','status','total_jugements'));
    }

    public function show_jugement_user_mois(Request $request)
    {
        $num_mois = $request->mois;

        $all_jugement_suppletifs =  JugementSuppletif::groupBy('users_id')
                                        ->selectRaw('count(id) as total,users_id')
                                        ->whereMonth('created_at',$num_mois)
                                        ->with('user')
                                        ->get();

        $i = 1;

        return view('pages.jugement_suppletif.jugement_user_mois',compact('all_jugement_suppletifs','num_mois','i'));
    }

    public function jugement_anti()
    {

        $user = Auth::user();
        if($user->hasRole('Administrateur'))
        {
            $all_jugement_suppletifs  = JugementSuppletif::where('status',1)->whereDate('created_at',now()->format('Y-m-d'))
                                                            ->get();
            $convertisseur = new NumberFormatter("fr", NumberFormatter::SPELLOUT);
        }
        else
        {
            $all_jugement_suppletifs  = JugementSuppletif::where('status',1)->whereDate('created_at',now()->format('Y-m-d'))
                                                            ->where('users_id',Auth::user()->id)
                                                            ->get();
            $convertisseur = new NumberFormatter("fr", NumberFormatter::SPELLOUT);
        }

        return view('pages.jugement_suppletif.jugement_anti',compact('all_jugement_suppletifs','convertisseur'));
    }

    public function create_jugement_anti()
    {
        $all_signateurs = GestionSignateur::all();

        if(auth()->user()->hasPermissionTo('Crée un jugement antidate'))
        {
                return view('pages.jugement_suppletif.create_anti',compact('all_signateurs'));
        }
        else
        {
            return view('errors.403');
        }
    }

    public function all_jugement()
    {
        return view('pages.jugement_suppletif.all_jugement');
    }

    public function check_num_jugement(Request $request)
    {
        $start = 1;
        $end = 18566;

        $usedNumbers = JugementSuppletif::whereYear('created_at', 2024)
        ->where(function ($query) use ($start, $end) {
            $query->whereBetween('num', [$start, $end])
                  ->orWhereBetween('num_anti', [$start, $end]);
        })
        ->get()
        ->pluck('num')
        ->merge(
            JugementSuppletif::whereYear('created_at', 2024)
                ->whereBetween('num_anti', [$start, $end])
                ->get()
                ->pluck('num_anti')
        )
        ->unique()
        ->toArray();

    // Générer la plage complète de numéros
    $allNumbers = range($start, $end);

    // Trouver les numéros manquants
    $unusedNumbers = array_diff($allNumbers, $usedNumbers);

    // Convertir en collection et paginer
    $unusedNumbersCollection = collect($unusedNumbers);
    $page = $request->get('page', 1);
    $perPage = 100; // Nombre de résultats par page

    $paginatedUnusedNumbers = new LengthAwarePaginator(
        $unusedNumbersCollection->forPage($page, $perPage),
        $unusedNumbersCollection->count(),
        $perPage,
        $page,
        ['path' => $request->url(), 'query' => $request->query()]
    );

        return view('pages.jugement_suppletif.numero',['unusedNumbers' => $paginatedUnusedNumbers]);
    }

    public function duplique_num()
    {
        // Filtrer les jugements pour l'année 2024
        $jugements2024 = JugementSuppletif::whereYear('created_at', 2024);

        // Trouver les numéros dupliqués dans les colonnes 'num' et 'num_anti'
        $duplicatedNums = DB::table('jugement_suppletif')
            ->select('num')
            ->whereYear('created_at', 2024)
            ->groupBy('num')
            ->havingRaw('COUNT(*) > 1')
            ->pluck('num');

        // Trouver les jugements avec ces numéros dupliqués soit dans 'num' soit dans 'num_anti'
        $jugements = JugementSuppletif::whereIn('num', $duplicatedNums)
            ->whereYear('created_at', 2024)
            ->get();


        return view('pages.jugement_suppletif.duplique',compact('jugements'));

    }

    public function duplique_num_anti()
    {
        // Filtrer les jugements pour l'année 2024
        $jugements2024 = JugementSuppletif::whereYear('created_at', 2024);

        // Trouver les numéros dupliqués dans les colonnes 'num' et 'num_anti'
        $duplicatedNums = DB::table('jugement_suppletif')
            ->select('num_anti')
            ->whereYear('created_at', 2024)
            ->groupBy('num_anti')
            ->havingRaw('COUNT(*) > 1')
            ->pluck('num_anti');

        // Trouver les jugements avec ces numéros dupliqués soit dans 'num' soit dans 'num_anti'
        $jugements = JugementSuppletif::whereIn('num_anti', $duplicatedNums)
            ->whereYear('created_at', 2024)
            ->get();


        return view('pages.jugement_suppletif.duplique_anti',compact('jugements'));

    }

}
