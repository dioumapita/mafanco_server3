<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ExportDailyRecords extends Command
{
    protected $signature = 'db:export-daily {date?}';
    protected $description = 'Export database records for a specific date';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $date = $this->argument('date') ?? Carbon::today()->toDateString();
        $formattedDate = Carbon::parse($date)->format('Y-m-d');
        $filename = "backup-{$formattedDate}.sql";

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
                $commands[] = "mysqldump --defaults-file={$myCnfPath} --no-create-info --where=\"DATE(created_at) = '{$formattedDate}'\" {$database} {$tableName} >> " . storage_path("app/{$filename}");
            }
        }

        // Exécuter les commandes
        foreach ($commands as $command) {
            $result = null;
            $output = null;
            exec($command, $output, $result);

            if ($result !== 0) {
                $this->error("Database records export failed for table. Please check your configuration.");
                return;
            }
        }

        $this->info("Database records export was successful. File: " . storage_path("app/{$filename}"));

        // Supprimer le fichier de configuration MySQL
        unlink($myCnfPath);
    }
}
