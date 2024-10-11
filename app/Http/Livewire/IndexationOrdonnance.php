<?php

namespace App\Http\Livewire;

use App\Models\Ordonnance;
use Livewire\Component;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class IndexationOrdonnance extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name_file;
    public $numero;
    public $date_ordonnance;
    public $demandeur;
    public $decision;
    public $nbre_heredite;

    public function open_file($name_file)
    {
        $this->name_file = $name_file;
    }

    public function indexer()
    {
        if($this->name_file)
        {
            $heredite =    Ordonnance::create([
                'numero' => $this->numero,
                'date' => $this->date_ordonnance,
                'demandeur' => $this->demandeur,
                'decision' => $this->decision,
            ]);
            /**
             * Renomer et déplacer
             */
            Storage::move('bannette/doc_ordonnance/'.$this->name_file,'documents/doc_ordonnance/'.$heredite->id.'.pdf');
        }

        $this->reset();

    }
    public function all_files()
    {
        $files = File::allFiles(public_path('/uploads/bannette/doc_ordonnance'));
        $this->nbre_heredite = count($files);

        return  array_slice($files,0,2);
    }

    public function render()
    {
        return view('livewire.indexation-ordonnance',
        [
            'all_files' => $this->all_files(),
            'name_file' => $this->name_file
        ]);
    }
}
