<?php

namespace App\Http\Controllers;

use App\Models\ImportationFIle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class ImportController extends Controller
{
    //

    public function index()
    {

        $all_importations = ImportationFIle::all();

        return view('pages.importation.index',compact('all_importations'));
    }

    public function store(Request $request)
    {
        $originalName = $request->file('sql_file')->getClientOriginalName();

        ImportationFIle::create([
                                    'date_ajout' => $request->date_ajout,
                                    'name_file' => $originalName
                               ]);

        // Stocker temporairement le fichier uploadé
        $path = $request->file('sql_file')->store('temp');

        // Lire le contenu du fichier SQL
        $sql = Storage::get($path);

        // Exécuter le SQL non préparé
        try {
            DB::unprepared($sql);
            Storage::delete($path); // Supprimer le fichier temporaire après l'importation
            dd("SQL file imported successfully.");
            // return redirect()->back()->with('success', 'SQL file imported successfully.');
        } catch (\Exception $e) {
            dd("SQL ERROR IMPORTING SQL FILE");
            // return redirect()->back()->withErrors(['error' => 'Error importing SQL file: ' . $e->getMessage()]);
        }
    }
}
