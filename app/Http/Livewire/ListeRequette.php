<?php

namespace App\Http\Livewire;

use App\Models\Requette;
use Livewire\Component;
use Livewire\WithPagination;

class ListeRequette extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchNumero;
    public $searchDateRequette;
    public $searchRequerant;
    public $searchObjet;

    public function list_requettes()
    {

        return   Requette::
                    when($this->searchRequerant,function($builder){
                        $builder->where('requerant','like','%'.$this->searchRequerant.'%');
                    })
                    ->when($this->searchNumero, function ($builder) {
                        $builder->where('numero','like','%'.$this->searchNumero.'%');
                    })
                    ->when($this->searchDateRequette, function ($builder) {
                        $builder->where(function ($builder) {
                            $builder->where('date_requette', 'like','%'.$this->searchDateRequette.'%');
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
        return view('livewire.liste-requette',
                        ['all_requettes' => $this->list_requettes()]
                );
    }
}
