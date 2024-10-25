<?php

namespace App\Http\Controllers;

use App\Models\Annee;
use App\Models\CertificatNationalite;
use App\Models\DocCertificat;
use App\Models\GestionSignateur;
use App\Models\GestionStatistique;
use Carbon\Carbon;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use RealRashid\SweetAlert\Facades\Alert;
use MercurySeries\Flashy\Flashy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnSelf;

class CertificatNationaliteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $from = Carbon::createFromFormat('d/m/Y','30/07/2024');
        // $to = Carbon::createFromFormat('d/m/Y','01/08/2024');

        // $all_jugements = CertificatNationalite::whereBetween('created_at',[$from,$to])->get();
        // // dd($all_jugements);
        // foreach($all_jugements as $jugement)
        // {
        //     CertificatNationalite::where('id',$jugement->id)->update([
        //         'signateur' => 'Fanta Alama CAMARA',
        //         'created_at' => '2024-08-01 09:00:00'
        //     ]);
        // }
        // dd("stop");
        $user = Auth::user();


        if($user->hasRole('Administrateur'))
        {
            $annee = Annee::where('status',1)->first()->annee;
            $all_certificats = CertificatNationalite::whereDate('created_at',now()->format('Y-m-d'))
                                                    ->whereYear('created_at',$annee)
                                                    ->get();
        }
        else
        {
            $annee = DB::table('annees')->latest('annee')->first()->annee;
            $all_certificats = CertificatNationalite::whereDate('created_at',now()->format('Y-m-d'))
                                                    ->where('users_id',Auth::user()->id)
                                                    ->whereYear('created_at',$annee)
                                                    ->get();
        }

        return view('pages.certificat_nationalite.index',compact('all_certificats','annee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->hasPermissionTo('Créer une nationalité'))
        {
            $all_signateurs = GestionSignateur::all();
            //
            return view('pages.certificat_nationalite.create',compact('all_signateurs'));
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

        if(CertificatNationalite::where('prenom_nom',$request->prenom_nom)->where('date_naiss',$request->date_naiss)
                                ->where('lieu',$request->lieu)->where('pere',$request->pere)->where('mere',$request->mere)
                                ->where('domicile',$request->domicile)->where('date_demande',$request->date_demande)
                                ->where('article',$request->article)->where('signateur',$request->signateur)
                                ->exists()
        )
        {
            $certificat = CertificatNationalite::where('prenom_nom',$request->prenom_nom)->where('date_naiss',$request->date_naiss)
                                    ->where('lieu',$request->lieu)->where('pere',$request->pere)->where('mere',$request->mere)
                                    ->where('domicile',$request->domicile)->where('date_demande',$request->date_demande)
                                    ->where('article',$request->article)->where('signateur',$request->signateur)
                                    ->first();

            return redirect()->route('certificat_nationalite.show',$certificat->id);
        }
        else
        {
            $num = 3722;

            $last_num = DB::table('certificat_nationalites')->latest('id')->first();
            // dd($last_num->num);

            if($last_num != null)
            {
                $num = $last_num->num + 1;
            }
            else
            {
                $num = 3722;
            }

            $new_certificat = CertificatNationalite::create([
                                                                'num' => $num,
                                                                'date_demande' => $request->date_demande,
                                                                'prenom_nom' => $request->prenom_nom,
                                                                'date_naiss' => $request->date_naiss,
                                                                'lieu' => $request->lieu,
                                                                'pere' => $request->pere,
                                                                'mere' => $request->mere,
                                                                'domicile' => $request->domicile,
                                                                'article' => $request->article,
                                                                'signateur' => $request->signateur,
                                                                'users_id' => Auth::user()->id,
                                                                'annee_id' => $annee_id,
                                                                'fonction' => $request->fonction,
                                                                'type' => $request->type,
                                                                'profession' => $request->profession
                                                            ]);

            $num_copie = $request->num_copie;
            $date_copie = $request->date_copie;
            foreach($request->copie as $key => $copie)
            {
                $new_document = DocCertificat::create([
                                                            'copie' => $copie,
                                                            'num_copie' => $num_copie[$key],
                                                            'date_copie' => $date_copie[$key],
                                                            'certificat_nationalites_id' => $new_certificat->id
                                                        ]);
            }

            QrCode::format('png')->generate(
                $num."\n".$request->prenom_nom."\n".Carbon::parse($request->date_naiss)->format('d/m/Y')."\n".$request->lieu."\n".$request->pere."\n".$request->mere,
                '../public/qrcodes/'.$new_certificat->id.'.png');

            //message flash
            Flashy::success('Le certificat de nationalité est crée avec succès');

            return redirect()->route('certificat_nationalite.show',$new_certificat->id);
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
        $certificat = CertificatNationalite::where('id',$id)->first();

        $info_signateur = GestionSignateur::where('nom_signateur',$certificat->signateur)->first();

        return view('pages.certificat_nationalite.show',compact('certificat','info_signateur'));
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
        if(auth()->user()->hasPermissionTo('Modifié une nationalité'))
        {
            $all_signateurs = GestionSignateur::all();

            $certificat = CertificatNationalite::where('id',$id)->first();

            $user = Auth::user();
            if($user->hasRole('Administrateur'))
            {
                return view('pages.certificat_nationalite.edit',compact('certificat','all_signateurs'));
            }
            else
            {
                if(now()->isAfter($certificat->expire_at))
                {
                    return view('errors.expiration');
                }
                else
                {
                    return view('pages.certificat_nationalite.edit',compact('certificat','all_signateurs'));
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
        $num = CertificatNationalite::where('id',$id)->first()->num;
        // $num = $request->num;
        QrCode::format('png')->generate(
            $num."\n".$request->prenom_nom."\n".Carbon::parse($request->date_naiss)->format('d/m/Y')."\n".$request->lieu."\n".$request->pere."\n".$request->mere,
            '../public/qrcodes/'.$id.'.png');

        $update = CertificatNationalite::where('id',$id)->update([
                    'date_demande' => $request->date_demande,
                    'prenom_nom' => $request->prenom_nom,
                    'date_naiss' => $request->date_naiss,
                    'lieu' => $request->lieu,
                    'pere' => $request->pere,
                    'mere' => $request->mere,
                    'domicile' => $request->domicile,
                    'article' => $request->article,
                    'signateur' => $request->signateur,
                    'fonction' => $request->fonction,
                    'type' => $request->type,
                    'profession' => $request->profession

        ]);

        Flashy::success('Le certificat de nationalité est modifier avec succès');

        return redirect()->route('certificat_nationalite.show',$id);
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
        if(auth()->user()->hasPermissionTo('Supprimé une nationalité'))
        {
            CertificatNationalite::where('id',$id)->delete();

            Flashy::success('Le certificat de nationalité a été supprimer avec succès');

            return redirect()->route('certificat_nationalite.index');
        }
        else
        {
            return view('errors.403');
        }
    }

    public function certificat_par_mois(Request $request)
    {
        $user = Auth::user();

        $num_mois = $request->mois;
        $annee = Annee::where('status',1)->first()->annee;

        if($user->hasRole('Controle'))
        {
            $limit = GestionStatistique::where('libelle','NATIONALITE')
                    ->where('mois',$num_mois)
                    ->whereYear('created_at',$annee)
                    ->first()
                    ->nbre;

            $all_certificats =     CertificatNationalite::whereMonth('created_at',$num_mois)->limit($limit)->get();
        }
        elseif($user->hasRole('Administrateur'))
        {
            $annee = Annee::where('status',1)->first()->annee;
            $all_certificats =     CertificatNationalite::
                                                        whereMonth('created_at',10)
                                                        ->whereYear('created_at',$annee)
                                                        ->get();
        }
        else
        {
            $annee = DB::table('annees')->latest('annee')->first()->annee;
            $all_certificats =  CertificatNationalite::whereMonth('created_at',$num_mois)
                                                        ->where('users_id',Auth::user()->id)
                                                        ->whereYear('created_at',$annee)
                                                        ->get();
        }

        return view('pages.certificat_nationalite.certificat_par_mois',compact('all_certificats','num_mois','annee'));
    }

    public function certificat_par_jour(Request $request)
    {
        $user = Auth::user();
        if($user->hasRole('Administrateur'))
        {
            $annee = Annee::where('status',1)->first()->annee;
            $all_certificats =  CertificatNationalite::whereDate('created_at',$request->date_choisie)
                                                        ->whereYear('created_at',$annee)
                                                        ->get();
            $date = Carbon::parse($request->date_choisie)->format('d/m/Y');
        }
        else
        {
            $annee = DB::table('annees')->latest('annee')->first()->annee;
            $all_certificats =  CertificatNationalite::whereDate('created_at',$request->date_choisie)
                                            ->where('users_id',Auth::user()->id)
                                            ->whereYear('created_at',$annee)
                                            ->get();
            $date = Carbon::parse($request->date_choisie)->format('d/m/Y');
        }

        return view('pages.certificat_nationalite.certificat_par_jour',compact('all_certificats','date','annee'));
    }

    public function default_certificat_nationalite_user_jour()
    {
        $date = now()->format('Y-m-d');


        $all_certificats = CertificatNationalite::groupBy('users_id')
                            ->selectRaw('count(id) as total,users_id')
                            ->whereDate('created_at',$date)
                            ->with('user')
                            ->get();

        $date =  Carbon::parse($date)->format('d/m/Y');

        $i = 1;

        return view('pages.certificat_nationalite.certificat_user_jour',compact('date','all_certificats','i'));
    }

    public function show_certificat_nationalite_user_jour(Request $request)
    {
        $date = $request->date_choisie;

        $all_certificats = CertificatNationalite::groupBy('users_id')
                            ->selectRaw('count(id) as total,users_id')
                            ->whereDate('created_at',$date)
                            ->with('user')
                            ->get();

        // dd($all_casiers);
        $date =  Carbon::parse($date)->format('d/m/Y');


        $i = 1;

        return view('pages.certificat_nationalite.certificat_user_jour',compact('date','all_certificats','i'));
    }

    public function show_certificat_nationalite_user_mois(Request $request)
    {

        $num_mois = $request->mois;

        $all_certificats = CertificatNationalite::groupBy('users_id')
                            ->selectRaw('count(id) as total,users_id')
                            ->whereMonth('created_at',$num_mois)
                            ->with('user')
                            ->get();

        $i = 1;

        return view('pages.certificat_nationalite.certificat_user_mois',compact('num_mois','all_certificats','i'));
    }

    /**
     * Add new document
     */

    public function add_new_doc(Request $request)
    {

    }
}
