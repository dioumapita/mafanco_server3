<?php

namespace App\Http\Livewire;

use App\Models\GestOrdonnance as ModelsGestOrdonnance;
use Livewire\Component;
use Livewire\WithPagination;

class GestOrdonnance extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchNumero;
    public $searchDate;
    public $searchDemandeur;

    public function list_ordonnances()
    {

        return   ModelsGestOrdonnance::
                    when($this->searchDemandeur,function($builder){
                        $builder->where('demandeurs','like','%'.$this->searchDemandeur.'%');
                    })
                    ->when($this->searchNumero, function ($builder) {
                        $builder->where('numero','like','%'.$this->searchNumero.'%');
                    })
                    ->when($this->searchDate, function ($builder) {
                        $builder->where(function ($builder) {
                            $builder->where('date', 'like','%'.$this->searchDate.'%');
                        });
                    })
                    ->paginate(10);
    }

    public function render()
    {
        return view('livewire.gest-ordonnance',
                ['all_ordonnances' => $this->list_ordonnances()]);
    }
}
