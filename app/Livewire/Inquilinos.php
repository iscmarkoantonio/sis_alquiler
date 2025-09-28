<?php

namespace App\Livewire;

use App\Models\Inquilino;
use Livewire\Component;
use Livewire\WithPagination;

class Inquilinos extends Component
{
    use WithPagination;
    protected $paginationTheme = "tailwind";

    public function render()
    {

        $inquilinos = Inquilino::paginate(10);
        return view('livewire.inquilinos', compact('inquilinos'));
    }
}
