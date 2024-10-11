<?php

namespace App\Http\Livewire;

use App\Models\GestJugementSuppletif;
use Livewire\Component;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class IndexationJugement extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name_file;
    public $numero;
    public $date;
    public $nom;
    public $date_naissance;
    public $lieu_naissance;
    public $filliation;
    public $nbre_jugement;

    public function open_file($name_file)
    {
        $this->name_file = $name_file;
    }

    public function indexer()
    {
        if($this->name_file)
        {
            $jugement =    GestJugementSuppletif::create([
                'numero' => $this->numero,
                'date' => $this->date,
                'nom' => $this->nom,
                'date_naissance' => $this->date_naissance,
                'lieu_naissance' => $this->lieu_naissance,
                'filiation' => $this->filliation,
                'name_file' => $this->name_file
            ]);
            /**
             * Renomer et déplacer
             */
            Storage::move('bannette/doc_jugement/'.$this->name_file,'gest/jugements/'.$jugement->id.'.pdf');
        }

        $this->reset();

    }

    public function all_files()
    {
        $files = File::allFiles(public_path('/uploads/bannette/doc_jugement'));
        $this->nbre_jugement = count($files);

        return  array_slice($files,0,2);
    }

    public function render()
    {
        return view('livewire.indexation-jugement',
            [
                'all_files' => $this->all_files(),
                'name_file' => $this->name_file
            ]
        );
    }
}
