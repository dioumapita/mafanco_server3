<?php

namespace App\Http\Controllers;

use App\Imports\PhotoCandidatImport;
use App\Models\Controle;
use App\Models\PhotoCandidat;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Maatwebsite\Excel\Facades\Excel;
use Picqer\Barcode\BarcodeGeneratorJPG;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\File;
class PhotoCandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $all_ecoles = PhotoCandidat::distinct()->get('ecole');

        //
        $all_candidats = PhotoCandidat::all();


        return view('pages.photo_candidat.index',compact('all_ecoles','all_candidats'));
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

        Excel::import(new PhotoCandidatImport,$request->file('liste_candidat'));

        $all_ecoles = PhotoCandidat::distinct()->get('ecole');

        foreach($all_ecoles as $ecole)
        {
            if(!File::isDirectory(public_path('images/Dubreka/'.'bepc_'.$ecole->ecole))){
                File::makeDirectory(public_path('images/Dubreka/'.'bepc_'.$ecole->ecole), 0777, true, true);
            }
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

        $candidat = PhotoCandidat::where('id',$id)->first();

        return view('pages.photo_candidat.show',compact('candidat'));
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

    /**
     * photo par ecole
     */

    public function photo_par_ecole($nom_ecole)
    {
        $candidats_ecoles = PhotoCandidat::where('ecole',$nom_ecole)->get();
        $all_ecoles = PhotoCandidat::distinct()->get('ecole');

        return view('pages.photo_candidat.photo_par_ecole',compact('candidats_ecoles','nom_ecole','all_ecoles'));
    }

    public function store_photo_candidat(Request $request)
    {

           $candidat = PhotoCandidat::where('n_photo',$request->n_photo)->first();
           $nom_ecole = $request->ecole;
           $img = Image::make($request->photo_candidat)->resize(1632,3264);
           $imgName = $request->n_photo.'.jpg';
           $chemin = public_path('images/Dubreka/bepc/');
           $chemin2 = public_path('images/Dubreka/bepc_'.$nom_ecole.'/');
           QrCode::format('png')->generate('Session:'.$candidat->ses_bepc.' Pv:'.$candidat->pv_bepc.' '.$candidat->prenom_et_nom.' date '.$candidat->date_naiss.' lieu '.$candidat->lieu,public_path('images/z.png'));

           $watermak = Image::make(public_path('images/z.png'))->resize(530,530);

           $watermak->resize(500,500);

           $img->insert($watermak,'bottom-left');

           $img->save($chemin.$imgName);
           $img->save($chemin2.$imgName);

           return back();


    }

    public function remove_photo_candidat()
    {
        $all_ecoles = PhotoCandidat::distinct()->get('ecole');

        foreach($all_ecoles as $ecole)
        {
            if(File::isDirectory(public_path('images/Dubreka/'.'bepc_'.$ecole->ecole))){
                File::deleteDirectory(public_path('images/Dubreka/'.'bepc_'.$ecole->ecole), 0777, true, true);
            }
        }

        PhotoCandidat::where('id','>',0)->delete();

        return back();
    }
}
