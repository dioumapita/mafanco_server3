<?php

namespace App\Http\Controllers;

use App\Models\Annee;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $all_annees = Annee::all();
        $annee_courante = Annee::where('status',1)->first();


        return view('welcome',compact('all_annees','annee_courante'));
    }
}
