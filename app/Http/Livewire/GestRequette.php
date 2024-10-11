<?php

namespace App\Http\Livewire;

use App\Models\GestRequette as ModelsGestRequette;
use Livewire\Component;
use Livewire\WithPagination;

class GestRequette extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchNumero;
    public $searchDate;
    public $searchRequerant;
    public $searchObjet;

    public function list_requettes()
    {

        return   ModelsGestRequette::
                    when($this->searchRequerant,function($builder){
                        $builder->where('requerant','like','%'.$this->searchRequerant.'%');
                    })
                    ->when($this->searchNumero, function ($builder) {
                        $builder->where('numero','like','%'.$this->searchNumero.'%');
                    })
                    ->when($this->searchDate, function ($builder) {
                        $builder->where(function ($builder) {
                            $builder->where('date_requete', 'like','%'.$this->searchDate.'%');
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
        return view('livewire.gest-requette',
        ['all_requettes' => $this->list_requettes()]);
    }
}
