<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\inventario;
use Livewire\WithPagination;



class SearchProducts extends Component
{
    public $nombre;
    public $productos=[];

    public function mount()
    {
        $this->reset();
    }


    public function buscarProducto()
    {
        $this->productos = inventario::where('nombre', 'like', '%' . $this->nombre . '%')->get();
    }

    public function render()
    {
        return view('livewire.search-products');
    }


   

}


