<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use App\Models\Role;

class Tabla extends Component
{
    // Variables
    public $roles;

    // Constructor
    public function mount()
    {
        $this->roles = Role::all();
    }

    public function render()
    {
        return view('livewire.roles.tabla', [
            'roles' => $this->roles
        ]);
    }
}
