<?php

namespace App\Livewire;

use App\Models\Inquilino;
use Livewire\Component;
use Livewire\WithPagination;

class Inquilinos extends Component
{
    use WithPagination;
    protected $paginationTheme = "tailwind";

    //campos del formulario de creacion
    public $nombres;
    public $email;
    public $telefono;
    public $fecha_nacimiento;
    public $documento_identidad;

    //campos del formulario edicion
    public $editNombres;
    public $editEmail;
    public $editTelefono;
    public $editFechaNacimiento;
    public $editDocumentoIdentidad;

    //control de los modales
    public $createModal = false;
    public $showModal = false;
    public $editModal = false;
    public $deleteModal = false;
    public $inquilinoSeleccionado;
    public $inquilinoEditando;
    public $inquilinoEliminar;

     //reglas de validacion
    protected $rules =[
    'nombres' => 'required|string|max:255',
    'email' => 'required|email|max:255|unique:inquilinos,email',
    'telefono' => 'required|string|max:20',
    'fecha_nacimiento' => 'required|date',
    'documento_identidad' => 'required|string|max:20|unique:inquilinos,documento_identidad',
    ];

    //resetear campos del formulario de creacion
    public function resetCreateForm()
    {
        $this->reset(['nombres', 'email', 'telefono', 'fecha_nacimiento', 'documento_identidad']);
        $this->resetErrorBag();
    }

    //resetear campos del formulario de edicion
       public function resetEditForm()
    {
        $this->reset(['editNombres', 'editEmail', 'editTelefono', 'editFechaNacimiento', 'editDocumentoIdentidad', 'inquilinoEditando']);
        $this->resetErrorBag();
    }

    //Mostrar modal de creacion

    public function openCreateModal()
    {
        $this->resetCreateForm();
        $this->createModal = true;
    }

    //guardar nuevo inquilino
    public function save()
    {
        $this->validate();
        Inquilino::create([
            'nombres' => $this->nombres,
            'email' => $this->email,
            'telefono' => $this->telefono,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'documento_identidad' => $this->documento_identidad,
        ]);
        $this->resetCreateForm();
        $this->createModal = false;
        session()->flash('message', 'Inquilino creado exitosamente.');
    }

    //mostrar detalles del inquilino
    public function show($id)
    {
        $this->inquilinoSeleccionado = Inquilino::findOrFail($id);
        $this->showModal = true;
    }

    //editar detalles del inquilino
     public function edit($id)
    {
        $this->inquilinoEditando = Inquilino::find($id);
        $this->editNombres = $this->inquilinoEditando->nombres;
        $this->editEmail = $this->inquilinoEditando->email;
        $this->editTelefono = $this->inquilinoEditando->telefono;
        $this->editFechaNacimiento = $this->inquilinoEditando->fecha_nacimiento;
        $this->editDocumentoIdentidad = $this->inquilinoEditando->documento_identidad;

        $this->editModal = true;
    }
     //reglas de validacion
    public function update()
    {
        $this->validate([
            'editNombres' => 'required|string|max:255',
            'editEmail' => 'required|email|max:255|unique:inquilinos,email',
            'editTelefono' => 'required|string|max:20',
            'editFechaNacimiento' => 'required|date',
            'editDocumentoIdentidad' => 'required|string|max:20|unique:inquilinos,documento_identidad',
        ]);

        $this->inquilinoEditando->update([
            'nombres' => $this->editNombres,
            'email' => $this->editEmail,
            'telefono' => $this->editTelefono,
            'fecha_nacimiento' => $this->editFechaNacimiento,
            'documento_identidad' => $this->editDocumentoIdentidad,
        ]);

        //resetear campos del formulario de edicion
        $this->resetEditForm();
        $this->editModal = false;
        session()->flash('message', 'Inquilino actualizado exitosamente');
    }



    public function render()
    {

        $inquilinos = Inquilino::paginate(10);
        return view('livewire.inquilinos', compact('inquilinos'));
    }
}
