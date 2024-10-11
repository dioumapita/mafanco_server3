<?php

namespace App\Http\Livewire;

use App\Models\JugementSuppletif;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Annee;
class AllJugement extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchNumero;
    public $searchNumeroAnti;
    public $searchDateNaiss;
    public $searchNom;

    public function list_jugements()
    {

        return   JugementSuppletif::
                    when($this->searchNom,function($builder){
                        $builder->where('concerne','like','%'.$this->searchNom.'%');
                    })
                    ->when($this->searchNumero, function ($builder) {
                        $builder->where('num','like','%'.$this->searchNumero.'%');
                    })
                    ->when($this->searchNumeroAnti, function($builder){
                        $builder->where('num_anti','like','%'.$this->searchNumeroAnti.'%');
                    })
                    ->when($this->searchDateNaiss, function ($builder) {
                        $builder->where(function ($builder) {
                            $builder->where('date_naiss', 'like','%'.$this->searchDateNaiss.'%');
                        });
                    })
                    ->paginate(10);
    }

    public function render()
    {
        return view('livewire.all-jugement',[
            'all_jugements' => $this->list_jugements(),
            'annee' => Annee::where('status',1)->first()->annee
        ]);
    }
}
