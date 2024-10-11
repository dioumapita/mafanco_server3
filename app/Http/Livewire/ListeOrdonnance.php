<?php

namespace App\Http\Livewire;

use App\Models\Ordonnance;
use Livewire\Component;
use Livewire\WithPagination;
class ListeOrdonnance extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchNumero;
    public $searchDateOrdonnance;
    public $searchDemandeur;

    public function list_ordonnances()
    {

        return   Ordonnance::
                    when($this->searchDemandeur,function($builder){
                        $builder->where('demandeur','like','%'.$this->searchDemandeur.'%');
                    })
                    ->when($this->searchNumero, function ($builder) {
                        $builder->where('numero','like','%'.$this->searchNumero.'%');
                    })
                    ->when($this->searchDateOrdonnance, function ($builder) {
                        $builder->where(function ($builder) {
                            $builder->where('date', 'like','%'.$this->searchDateOrdonnance.'%');
                        });
                    })
                    ->paginate(10);
    }

    public function render()
    {
        return view('livewire.liste-ordonnance',
            ['all_ordonnances' => $this->list_ordonnances()]
        );
    }
}
