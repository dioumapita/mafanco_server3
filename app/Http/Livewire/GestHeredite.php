<?php

namespace App\Http\Livewire;

use App\Models\GestHeredite as ModelsGestHeredite;
use Livewire\Component;
use Livewire\WithPagination;

class GestHeredite extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchNumero;
    public $searchDate;
    public $searchAffaire;
    public $searchObjet;

    public function list_heredites()
    {

        return   ModelsGestHeredite::
                    when($this->searchAffaire,function($builder){
                        $builder->where('affaire','like','%'.$this->searchAffaire.'%');
                    })
                    ->when($this->searchNumero, function ($builder) {
                        $builder->where('numero','like','%'.$this->searchNumero.'%');
                    })
                    ->when($this->searchDate, function ($builder) {
                        $builder->where(function ($builder) {
                            $builder->where('date', 'like','%'.$this->searchDate.'%');
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
        return view('livewire.gest-heredite',
        ['all_heredites' => $this->list_heredites()]);
    }
}
