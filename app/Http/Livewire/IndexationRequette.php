<?php

namespace App\Http\Livewire;

use App\Models\Requette;
use Livewire\Component;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class IndexationRequette extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name_file;
    public $numero;
    public $date_requette;
    public $requerant;
    public $objet;
    public $nbre_requette;

    public function open_file($name_file)
    {
        $this->name_file = $name_file;
    }

    public function indexer()
    {
        if($this->name_file)
        {
            $requette =    Requette::create([
                'numero' => $this->numero,
                'date_requette' => $this->date_requette,
                'requerant' => $this->requerant,
                'objet' => $this->objet,
                'name_file' => $this->name_file
            ]);
            /**
             * Renomer et déplacer
             */
            Storage::move('bannette/doc_requette/'.$this->name_file,'documents/doc_requette/'.$requette->id.'.pdf');
        }

        $this->reset();

    }

    public function all_files()
    {
        $files = File::allFiles(public_path('/uploads/bannette/doc_requette'));
        $this->nbre_requette = count($files);

        return  array_slice($files,0,2);
    }

    public function render()
    {
        return view('livewire.indexation-requette',
            [
                'all_files' => $this->all_files(),
                'name_file' => $this->name_file
            ]
        );
    }
}
