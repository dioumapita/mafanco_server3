<?php

namespace App\Http\Livewire;

use App\Models\PlumitifCivil;
use Livewire\Component;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
class IndexationPlumitifCivil extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name_file;
    public $numero;
    public $date;
    public $affaire;
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
            $minute_civil =    PlumitifCivil::create([
                'numero' => $this->numero,
                'date' => $this->date,
                'objet' => $this->objet,
                'affaire' => $this->affaire,
                'name_file' => $this->name_file
            ]);
            /**
             * Renomer et déplacer
             */
            Storage::move('bannette/p_civils/'.$this->name_file,'documents/p_civils/'.$minute_civil->id.'.pdf');
        }

        $this->reset();

    }

    public function all_files()
    {
        $files = File::allFiles(public_path('/uploads/bannette/p_civils'));
        $this->nbre_requette = count($files);

        return  array_slice($files,0,2);
    }

    public function render()
    {
        return view('livewire.indexation-plumitif-civil',
            [
                'all_files' => $this->all_files(),
                'name_file' => $this->name_file
            ]
        );
    }
}
