<?php

namespace App\Http\Controllers;

use App\Models\ActeInculpe;
use App\Models\FaitInculpe;
use App\Models\Inculpe;
use App\Models\RgInstruction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class RgInstructionController extends Controller
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

             $all_instructions = RgInstruction::all();
        }
        elseif(auth()->user()->hasPermissionTo('Cabinet 1'))
        {
            $all_instructions = RgInstruction::all();
        }
        else
        {
            return view('errors.403');
        }

        return view('pages.rg_instructions.index',compact('all_instructions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = Auth::user();
        if($user->hasRole('Administrateur'))
        {
            return view('pages.rg_instructions.create');
        }
        elseif(auth()->user()->hasPermissionTo('Cabinet 1'))
        {
            return view('pages.rg_instructions.create');
        }
        else
        {
            return view('errors.403');
        }


        return view('pages.rg_instructions.create');
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
        $new_instruction = RgInstruction::create([
                                                    'num_rp' => $request->num_rp,
                                                    'num_ri' => $request->num_ri
                                                ]);

        // inclupé

        $prenom_nom = $request->prenom_nom;
        $date_naiss = $request->date_naiss;
        $lieu_naiss = $request->lieu_naiss;
        $pere = $request->pere;
        $mere = $request->mere;
        $domicile = $request->domicile;

                foreach($prenom_nom as $key => $accuse)
                {
                    $new_inculpe =  Inculpe::create([
                                                    'prenom_nom' => $accuse,
                                                    'date_naiss' => $date_naiss[$key],
                                                    'lieu_naiss' => $lieu_naiss[$key],
                                                    'pere' => $pere[$key],
                                                    'mere' => $mere[$key],
                                                    'domicile' => $domicile[$key],
                                                    'rg_instructions_id' => $new_instruction->id
                                                ]);
                }

        //faits

        $date_faits = $request->date_faits;
        $nature_fait = $request->nature_faits;

                foreach($date_faits as $key => $date_fait)
                {
                    $new_fait = FaitInculpe::create([
                                                        'date_faits' => $date_fait,
                                                        'nature_faits' => $nature_fait[$key],
                                                        'rg_instructions_id' => $new_instruction->id
                                                    ]);
                }

        //actes
        $date_actes = $request->date_actes;
        $nature_actes = $request->nature_actes;

                foreach($date_actes as $key => $date_acte)
                {
                    $new_acte = ActeInculpe::create([
                                                        'date_actes' => $date_acte,
                                                        'nature_actes' => $nature_actes[$key],
                                                        'rg_instructions_id' => $new_instruction->id
                                                    ]);
                }

        return redirect()->route('rg_instruction.show',$new_instruction->id);
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
        $user = Auth::user();

        if($user->hasRole('Administrateur'))
        {
            $instruction = RgInstruction::where('id',$id)->first();
        }
        elseif(auth()->user()->hasPermissionTo('Cabinet 1'))
        {
            $instruction = RgInstruction::where('id',$id)->first();
        }
        else
        {
            return view('errors.403');
        }

        return view('pages.rg_instructions.show',compact('instruction'));
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

        $update = RgInstruction::where('id',$id)->update([
                                                            'num_rp' => $request->num_rp,
                                                            'num_ri' => $request->num_ri
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
        RgInstruction::where('id',$id)->delete();

        return redirect()->route('rg_instruction.index');
    }
}
