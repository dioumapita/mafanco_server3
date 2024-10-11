<?php

namespace App\Http\Livewire;

use App\Models\PlumitifCorrectionnel;
use Livewire\Component;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
class IndexationPlumitifCorrectionnel extends Component
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

    public function all_files()
    {
        $files = File::allFiles(public_path('/uploads/bannette/p_correctionnels'));
        $this->nbre_requette = count($files);

        return  array_slice($files,0,2);
    }

    public function indexer()
    {
        if($this->name_file)
        {
            $minute_correctionnel =    PlumitifCorrectionnel::create([
                'numero' => $this->numero,
                'date' => $this->date,
                'objet' => $this->objet,
                'affaire' => $this->affaire,
                'name_file' => $this->name_file
            ]);
            /**
             * Renomer et déplacer
             */
            Storage::move('bannette/p_correctionnels/'.$this->name_file,'documents/p_correctionnels/'.$minute_correctionnel->id.'.pdf');
        }

        $this->reset();

    }

    public function render()
    {
        return view('livewire.indexation-plumitif-correctionnel',[
            'all_files' => $this->all_files(),
            'name_file' => $this->name_file
        ]);
    }
}
