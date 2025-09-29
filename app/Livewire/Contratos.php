<?php

namespace App\Livewire;

use App\Models\Contrato;
use Livewire\Component;
use Livewire\WithPagination;

class Contratos extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    //campos del formulario de creacion
    public $propiedad_id;
    public $inquilino_id;
    public $fecha_inicio;
    public $fecha_fin;
    public $monto_renta;
    public $estado;

    //campos del formulario de edicion
    public $editPropiedad_id;
    public $editInquilino_id;
    public $editFecha_inicio;
    public $editFecha_fin;
    public $editMonto_renta;
    public $editEstado;

    //control de modals
    public $createModal = false;
    public $showModal = false;
    public $editModal = false;
    public $deleteModal = false;
    public $contratoSeleccionado;
    public $contratoEditando;
    public $contratoEliminar;

    //reglas de validacion
     protected $rules = [
        'propiedad_id' => 'required|exists:propiedads,id',
        'inquilino_id' => 'required|exists:inquilinos,id',
        'fecha_inicio' => 'required|date',
        'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        'monto_renta' => 'required|numeric|min:0|',
        'estado' => 'required|in:activo,inactivo,finalizado',
    ];

     //Resetear campos del formulario de creación
    public function resetCreateForm()
    {
        $this->reset(['propiedad_id', 'inquilino_id', 'fecha_inicio', 'fecha_fin', 'monto_renta', 'estado']);
        $this->resetErrorBag();
    }

    //Resetear campos del formulario de edicion
    public function resetEditForm()
    {
        $this->reset(['editPropiedad_id', 'editInquilino_id', 'editFecha_inicio', 'editFecha_fin', 'editMonto_renta', 'editEstado']);
        $this->resetErrorBag();
    }   

    public function render()
    {
        $contratos = Contrato::with(['propiedad', 'inquilino'])
        ->orderBy('created_at', 'desc')
        ->paginate(10);
        return view('livewire.contratos', compact('contratos'));
    }
}
