<?php

namespace App\Http\Livewire;

use App\Models\GestNationalite as ModelsGestNationalite;
use Livewire\Component;
use Livewire\WithPagination;

class GestNationalite extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchNumero;
    public $searchDateNaiss;
    public $searchNom;

    public function list_nationalites()
    {

        return    ModelsGestNationalite::
                    when($this->searchNom,function($builder){
                        $builder->where('nom','like','%'.$this->searchNom.'%');
                    })
                    ->when($this->searchNumero, function ($builder) {
                        $builder->where('numero','like','%'.$this->searchNumero.'%');
                    })
                    ->when($this->searchDateNaiss, function ($builder) {
                        $builder->where(function ($builder) {
                            $builder->where('date_naissance', 'like','%'.$this->searchDateNaiss.'%');
                        });
                    })
                    ->paginate(10);
    }

    public function render()
    {
        return view('livewire.gest-nationalite',
        ['all_nationalites' => $this->list_nationalites()]);
    }
}
