<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ExportDatabase extends Command
{
    protected $signature = 'db:export';
    protected $description = 'Export the database with the current date in the filename';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $database = env('DB_DATABASE');
        $username = env('DB_USERNAME');
        $password = env('DB_PASSWORD');
        $host = env('DB_HOST');
        $backupPath = storage_path('backups');

        if (!file_exists($backupPath)) {
            mkdir($backupPath, 0755, true);
        }

        $date = Carbon::now()->format('Y-m-d_H-i-s');
        $filename = $backupPath . '/' . $database . '_' . $date . '.sql';

        $command = "mysqldump --user={$username} --password={$password} --host={$host} {$database} > {$filename}";

        $output = null;
        $resultCode = null;

        exec($command, $output, $resultCode);

        if ($resultCode === 0) {
            $this->info('The backup has been created successfully.');
        } else {
            $this->error('An error occurred while creating the backup.');
        }
    }
}
