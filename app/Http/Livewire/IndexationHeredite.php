<?php

namespace App\Http\Livewire;

use App\Models\Heredite;
use Livewire\Component;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
class IndexationHeredite extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name_file;
    public $numero;
    public $date_heredite;
    public $affaire;
    public $objet;
    public $nbre_heredite;

    public function open_file($name_file)
    {
        $this->name_file = $name_file;
    }

    public function indexer()
    {
        if($this->name_file)
        {
            $heredite =    Heredite::create([
                'numero' => $this->numero,
                'date' => $this->date_heredite,
                'affaire' => $this->affaire,
                'objet' => $this->objet,
                'name_file' => $this->name_file
            ]);
            /**
             * Renomer et déplacer
             */
            Storage::move('bannette/doc_heredite/'.$this->name_file,'documents/doc_heredite/'.$heredite->id.'.pdf');
        }

        $this->reset();

    }

    public function all_files()
    {
        $files = File::allFiles(public_path('/uploads/bannette/doc_heredite'));
        $this->nbre_heredite = count($files);

        return  array_slice($files,0,2);
    }

    public function render()
    {
        return view('livewire.indexation-heredite',
            [
                'all_files' => $this->all_files(),
                'name_file' => $this->name_file
            ]
        );
    }
}
