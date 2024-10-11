<?php

namespace App\Http\Livewire;

use App\Models\GestPlumitifCorrectionnel as ModelsGestPlumitifCorrectionnel;
use Livewire\Component;
use Livewire\WithPagination;

class GestPlumitifCorrectionnel extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchNumero;
    public $searchDateDecision;
    public $searchAffaire;
    public $searchPrevention;
    public $searchPartieCivile;

    public function list_plumitifs()
    {

        return   ModelsGestPlumitifCorrectionnel::
                    when($this->searchAffaire,function($builder){
                        $builder->where('affaire','like','%'.$this->searchAffaire.'%');
                    })
                    ->when($this->searchNumero, function ($builder) {
                        $builder->where('numero','like','%'.$this->searchNumero.'%');
                    })
                    ->when($this->searchDateDecision, function ($builder) {
                        $builder->where(function ($builder) {
                            $builder->where('date_decision', 'like','%'.$this->searchDateDecision.'%');
                        });
                    })
                    ->when($this->searchPrevention, function ($builder) {
                        $builder->where(function ($builder) {
                            $builder->where('prevention', 'like','%'.$this->searchPrevention.'%');
                        });
                    })
                    ->when($this->searchPartieCivile, function ($builder) {
                        $builder->where(function ($builder) {
                            $builder->where('partie_civile', 'like','%'.$this->searchPartieCivile.'%');
                        });
                    })
                    ->paginate(10);
    }

    public function render()
    {
        return view('livewire.gest-plumitif-correctionnel',
                ['all_plumitifs' => $this->list_plumitifs()]);
    }
}
