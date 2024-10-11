<?php

namespace App\Imports;

use App\Models\PhotoCandidat;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class PhotoCandidatImport implements ToModel,WithHeadingRow,SkipsOnError,WithBatchInserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $p1 = '/\s+/';
        $p2 = '/\/+/';
        return new PhotoCandidat([
            //
            $patern = '/\/+/,/\s+/',
            'centre' => $row['centre'],
            'ecole' => preg_replace(array($p1,$p2),' ',$row['ecole']),
            'n_photo' => $row['no_photo'],
            'prenom_et_nom' => $row['prenoms_et_nom'],
            'sexe' => $row['sex'],
            'date_naiss' => $row['date_naiss'],
            'lieu' => $row['lieu_naiss'],
            'pere' => $row['pere'],
            'mere' => $row['mere'],
            'ses_bepc' => $row['ses_bepc'],
            'pv_bepc' => $row['pv_bepc'],
            'nat' => $row['nat']
        ]);
    }

    public function onError(\Throwable $e)
    {
        // Handle the exception how you'd like.
    }

    public function batchSize(): int
    {
        return 1000;
    }

}
