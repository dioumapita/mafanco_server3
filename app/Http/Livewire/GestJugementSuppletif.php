<?php

namespace App\Http\Livewire;

use App\Models\GestJugementSuppletif as ModelsGestJugementSuppletif;
use Livewire\Component;
use Livewire\WithPagination;

class GestJugementSuppletif extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchNumero;
    public $searchDateNaiss;
    public $searchNom;

    public function list_jugements()
    {

        return   ModelsGestJugementSuppletif::
                    when($this->searchNom,function($builder){
                        $builder->where('nom','like','%'.$this->searchNom.'%');
                    })
                    ->when($this->searchNumero, function ($builder) {
                        $builder->where('numero','like','%'.$this->searchNumero.'%');
                    })
                    ->when($this->searchDateNaiss, function ($builder) {
                        $builder->where(function ($builder) {
                            $builder->where('date_naissance', 'like','%'.$this->searchDateNaiss.'%');
                        });
                    })
                    ->paginate(10);
    }


    public function render()
    {
        return view('livewire.gest-jugement-suppletif',[
            'all_jugements' => $this->list_jugements()
        ]);
    }
}
