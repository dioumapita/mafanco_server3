<?php

namespace App\Http\Livewire;

use App\Models\Inculpe;
use App\Models\RgInstruction;
use Livewire\Component;
use Livewire\WithPagination;

class ListeRI1 extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchNumero;
    public $searchInculpe;
    public $searchFait;
    public $searchActe;

    public function list_instructions()
    {
        $searchNumero = null;
     return RgInstruction::where('num_ri', 'LIKE', '%' .$this->searchNumero. '%')
        ->orWhereHas('inculpes', function($q) use($searchNumero) {
            return $q->where('prenom_nom', 'LIKE', '%' . $this->searchNumero . '%');
        })
        ->orWhereHas('fait_inculpes', function($q) use($searchNumero) {
            return $q->where('nature_faits', 'LIKE', '%' . $this->searchNumero . '%');
        })
        ->paginate(10);

    }

    public function render()
    {
        return view('livewire.liste-r-i1',
                        [
                            'all_instructions' => $this->list_instructions()
                        ]
                );
    }
}
