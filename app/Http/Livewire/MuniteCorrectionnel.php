<?php

namespace App\Http\Livewire;

use App\Models\PlumitifCorrectionnel;
use Livewire\Component;
use Livewire\WithPagination;
class MuniteCorrectionnel extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchNumero;
    public $searchDateDecision;
    public $searchAffaire;
    public $searchObjet;

    public function list_plumitifs()
    {

        return   PlumitifCorrectionnel::
                    when($this->searchAffaire,function($builder){
                        $builder->where('affaire','like','%'.$this->searchAffaire.'%');
                    })
                    ->when($this->searchNumero, function ($builder) {
                        $builder->where('numero','like','%'.$this->searchNumero.'%');
                    })
                    ->when($this->searchDateDecision, function ($builder) {
                        $builder->where(function ($builder) {
                            $builder->where('date', 'like','%'.$this->searchDateDecision.'%');
                        });
                    })
                    ->when($this->searchObjet, function ($builder) {
                        $builder->where(function ($builder) {
                            $builder->where('objet', 'like','%'.$this->searchObjet.'%');
                        });
                    })
                    ->paginate(10);
    }

    public function render()
    {
        return view('livewire.munite-correctionnel',
            [
                'all_plumitifs' => $this->list_plumitifs()
            ]
        );
    }
}
