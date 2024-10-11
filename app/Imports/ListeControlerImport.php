<?php

namespace App\Imports;

use App\Models\Controle;
use App\Models\ListeControler;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;
class ListeControlerImport implements ToModel,WithHeadingRow
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

        if(
            Controle::where('profil',Str::title(preg_replace('/\s+/', ' ',strtr($row['profil'],$char))))
                    ->where('nom_candidat',Str::title(preg_replace('/\s+/',' ',strtr($row['nom_candidat'],$char))))
                    ->where('s',Str::title(preg_replace('/\s+/',' ',strtr($row['s'],$char))))
                    ->where('date_naiss',$row['date'])
                    ->where('lieu',Str::title(preg_replace('/\s+/',' ',strtr($row['lieu'],$char))))
                    ->where('pere',Str::title(preg_replace('/\s+/',' ',strtr($row['pere'],$char))))
                    ->where('mere',Str::title(preg_replace('/\s+/',' ',strtr($row['mere'],$char))))
                    ->where('n',$row['n'])
                    ->where('dpe',Str::title(preg_replace('/\s+/',' ',strtr($row['dpe'],$char))))
                    ->where('session',$row['session'])
                    ->where('pv',$row['pv'])
                    ->exists()
            )
            {
                return new ListeControler([
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
                    'status' => 1

                ]);
            }
            else
            {
                return new ListeControler([
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
                    'status' => 0

                ]);
            }
    }
}
