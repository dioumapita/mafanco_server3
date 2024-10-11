<?php

namespace App\Http\Livewire;

use App\Models\Heredite;
use Livewire\Component;
use Livewire\WithPagination;

class ListeHeredite extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchNumero;
    public $searchDateHeredite;
    public $searchAffaire;

    public function list_heredites()
    {

        return   Heredite::
                    when($this->searchAffaire,function($builder){
                        $builder->where('affaire','like','%'.$this->searchAffaire.'%');
                    })
                    ->when($this->searchNumero, function ($builder) {
                        $builder->where('numero','like','%'.$this->searchNumero.'%');
                    })
                    ->when($this->searchDateHeredite, function ($builder) {
                        $builder->where(function ($builder) {
                            $builder->where('date', 'like','%'.$this->searchDateHeredite.'%');
                        });
                    })
                    ->paginate(10);
    }

    public function render()
    {
        return view('livewire.liste-heredite',
                        ['all_heredites' => $this->list_heredites()]
                );
    }
}
