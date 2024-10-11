<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ImportSqlFile extends Command
{
    protected $signature = 'db:import-sql';
    protected $description = 'Import a SQL file into the database';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Demander à l'utilisateur de fournir le chemin du fichier SQL
        $filePath = $this->ask('Please provide the path to the SQL file');

        // Vérifier si le fichier existe
        if (!File::exists($filePath)) {
            $this->error("File not found: {$filePath}");
            return 1;
        }

        // Lire le contenu du fichier SQL
        $sql = File::get($filePath);

        // Exécuter le SQL non préparé
        try {
            DB::unprepared($sql);
            $this->info("SQL file imported successfully.");
        } catch (\Exception $e) {
            $this->error("Error importing SQL file: " . $e->getMessage());
            return 1;
        }

        return 0;
    }
}
