<?php

namespace App\Http\Livewire;

use App\Models\Appel;
use Livewire\Component;
use Livewire\WithPagination;

class ListeAppel extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchNumero;
    public $searchDateAppel;
    public $searchLesParties;

    public function list_appels()
    {

        return   Appel::
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
        return view('livewire.liste-appel',
                        ['all_appels' => $this->list_appels()]
                );
    }
}
