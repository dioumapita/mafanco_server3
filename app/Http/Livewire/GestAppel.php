<?php

namespace App\Http\Livewire;

use App\Models\GestAppel as ModelsGestAppel;
use Livewire\WithPagination;
use Livewire\Component;

class GestAppel extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchNumero;
    public $searchDateAppel;
    public $searchLesParties;

    public function list_appels()
    {

        return   ModelsGestAppel::
                    when($this->searchLesParties,function($builder){
                        $builder->where('les_parties','like','%'.$this->searchLesParties.'%');
                    })
                    ->when($this->searchNumero, function ($builder) {
                        $builder->where('numero','like','%'.$this->searchNumero.'%');
                    })
                    ->when($this->searchDateAppel, function ($builder) {
                        $builder->where(function ($builder) {
                            $builder->where('date_appel', 'like','%'.$this->searchDateAppel.'%');
                        });
                    })
                    ->paginate(10);
    }


    public function render()
    {




        return view('livewire.gest-appel',
            ['all_appels' => $this->list_appels() ]
        );
    }
}
