<?php

namespace App\Imports;

use App\Models\Controle;
use App\Models\ListeControler;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class ControleImport implements ToModel,WithHeadingRow,WithBatchInserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $char= array( 'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                        'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
                        'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
                        'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
                        'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y');

                 return new Controle([
                    //
                    'profil' => Str::title(preg_replace('/\s+/', ' ',strtr($row['profil'],$char))),
                    'nom_candidat' => Str::title(preg_replace('/\s+/',' ',strtr($row['nom_candidat'],$char))),
                    's' => Str::title(preg_replace('/\s+/',' ',strtr($row['s'],$char))),
                    'date_naiss' => $row['date'],
                    'lieu' => Str::title(preg_replace('/\s+/',' ',strtr($row['lieu'],$char))),
                    'pere' => Str::title(preg_replace('/\s+/',' ',strtr($row['pere'],$char))),
                    'mere' => Str::title(preg_replace('/\s+/',' ',strtr($row['mere'],$char))),
                    'n' => $row['n'],
                    'dpe' => Str::title(preg_replace('/\s+/',' ',strtr($row['dpe'],$char))),
                    'session' => $row['session'],
                    'pv' => $row['pv'],
                    'status' => 55
                ]);

    }
    public function batchSize(): int
    {
        return 1000;
    }
}
