<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ExportController extends Controller
{
    //
    public function store(Request $request)
    {
        // Valider la date
        $request->validate([
            'date' => 'required|date',
        ]);

        $date = $request->input('date');

        // Validation de la date
        try {
            $formattedDate = Carbon::parse($date)->format('Y-m-d');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => "Invalid date format: {$date}"]);
        }

        $filename = "backup-{$formattedDate}.sql";
        $tempFilePath = storage_path("app/{$filename}");
        $publicFilePath = public_path("uploads/exportation/{$filename}");

        // Connexion à la base de données
        $database = env('DB_DATABASE');
        $username = env('DB_USERNAME');
        $password = env('DB_PASSWORD');
        $host = env('DB_HOST');

        // Créer un fichier de configuration MySQL sécurisé
        $myCnfPath = storage_path('app/my.cnf');
        file_put_contents($myCnfPath, "[mysqldump]\nuser={$username}\npassword={$password}\nhost={$host}\n");

        // Récupérer les tables de la base de données
        $tables = DB::select('SHOW TABLES');
        $tableNameField = 'Tables_in_' . $database;

        $commands = [];
        foreach ($tables as $table) {
            $tableName = $table->$tableNameField;
            $columnExists = DB::select("SHOW COLUMNS FROM {$tableName} LIKE 'created_at'");

            if (!empty($columnExists)) {
                $commands[] = "mysqldump --defaults-file={$myCnfPath} --no-create-info --where=\"DATE(created_at) = '{$formattedDate}'\" {$database} {$tableName} >> " . escapeshellarg($tempFilePath);
            }
        }

        // Exécuter les commandes
        foreach ($commands as $command) {
            $result = null;
            $output = null;
            exec($command, $output, $result);

            if ($result !== 0) {
                unlink($myCnfPath); // Supprimer le fichier de configuration MySQL
                return redirect()->back()->withErrors(['error' => 'Database records export failed. Please check your configuration.']);
            }
        }

        // Déplacer le fichier vers le dossier public/uploads/exportation
        if (!file_exists(public_path('uploads/exportation'))) {
            mkdir(public_path('uploads/exportation'), 0755, true);
        }

        if (!rename($tempFilePath, $publicFilePath)) {
            unlink($myCnfPath); // Supprimer le fichier de configuration MySQL
            return redirect()->back()->withErrors(['error' => 'Failed to move the export file to the public directory.']);
        }

        unlink($myCnfPath); // Supprimer le fichier de configuration MySQL
        return redirect()->back()->with('success', "Database records export was successful. File: " . $publicFilePath);
    }
}
