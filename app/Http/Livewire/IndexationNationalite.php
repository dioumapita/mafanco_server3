<?php

namespace App\Http\Livewire;

use App\Models\GestNationalite;
use Livewire\Component;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
class IndexationNationalite extends Component
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
    public $nbre_nationalite;

    public function open_file($name_file)
    {
        $this->name_file = $name_file;
    }

    public function indexer()
    {
        if($this->name_file)
        {
            $nationalite =    GestNationalite::create([
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
            Storage::move('bannette/doc_nationalite/'.$this->name_file,'gest/nationalites/'.$nationalite->id.'.pdf');
        }

        $this->reset();

    }

    public function all_files()
    {
        $files = File::allFiles(public_path('/uploads/bannette/doc_nationalite'));
        $this->nbre_nationalite = count($files);

        return  array_slice($files,0,2);
    }

    public function render()
    {
        return view('livewire.indexation-nationalite',
            [
                'all_files' => $this->all_files(),
                'name_file' => $this->name_file
            ]
        );
    }
}
