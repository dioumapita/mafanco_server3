<?php

namespace App\Http\Livewire;

use App\Models\Appel;
use Livewire\Component;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;
class IndexationAppel extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name_file;
    public $numero;
    public $date_appel;
    public $les_parties;
    public $type;
    public $date_transmission;
    public $nbre_appel;

    public function open_file($name_file)
    {
        $this->name_file = $name_file;
    }

    public function indexer()
    {
        // Récupérer le mois actuel
        // $currentMonthName = Carbon::now()->locale('fr')->isoFormat('MMMM');
        // // Chemin du dossier que vous voulez vérifier/créer
        // $directoryPath = 'documents/2024/'.$currentMonthName;
        // // Vérifier si le dossier existe
        // if (!Storage::exists($directoryPath)) {
        //     // Si le dossier n'existe pas, on le crée
        //     Storage::makeDirectory($directoryPath);
        // } else {
        // }
        // // Chemin du dossier que vous voulez vérifier/créer
        // $seconddirectoryPath = 'documents/2024/'.$currentMonthName.'/doc_appel';
        // if (!Storage::exists($seconddirectoryPath)) {
        //     // Si le dossier n'existe pas, on le crée
        //     Storage::makeDirectory($seconddirectoryPath);
        // } else {

        // }


        if($this->name_file)
        {
            $appel =    Appel::create([
                'numero' => $this->numero,
                'date_appel' => $this->date_appel,
                'les_parties' => $this->les_parties,
                'type' => $this->type,
                'date_transmission' => $this->date_transmission,
                'name_file' => $this->name_file
            ]);
            /**
             * Renomer et déplacer
             */
            Storage::move('bannette/doc_appel/'.$this->name_file,'documents/doc_appel/'.$appel->id.'.pdf');
        }
        else
        {
            $appel =    Appel::create([
                'numero' => $this->numero,
                'date_appel' => $this->date_appel,
                'les_parties' => $this->les_parties,
                'type' => $this->type,
                'date_transmission' => $this->date_transmission,
            ]);
        }

        $this->reset();

    }

    public function all_files()
    {
        $files = File::allFiles(public_path('/uploads/bannette/doc_appel'));
        $this->nbre_appel = count($files);

        return  array_slice($files,0,2);
    }

    public function render()
    {
        return view('livewire.indexation-appel',
            [
                'all_files' => $this->all_files(),
                'name_file' => $this->name_file
            ]
        );
    }
}
