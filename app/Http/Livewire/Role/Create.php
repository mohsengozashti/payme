<?php

namespace App\Http\Livewire\Role;

use Illuminate\Validation\Rule;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Create extends Component
{
    public Role $role;
    public array $selectedPermissions = [];

    public function mount(){
        $this->role = new Role();
    }

    public function rules(){
        return [
            'role.name' => ['required','string','unique:roles,name'],
            'role.description' => ['required','string'],
            'selectedPermissions' => ['required' , 'array' , Rule::in(Permission::all()->pluck('name')->toArray())]
        ];
    }

    public function updated($field){
        $this->validateOnly($field,$this->rules());
    }

    public function create(){
        $this->validate($this->rules());
        $this->role->save();
        $this->role->givePermissionTo($this->selectedPermissions);
        $this->redirect(route('roles.index'));
    }

    public function render()
    {
        return view('livewire.role.create')->extends('layouts.layout')->section('content');
    }
}
