<?php

namespace App\Http\Livewire\Role;

use Illuminate\Validation\Rule;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Edit extends Component
{
    public Role $role;
    public array $selectedPermissions = [];

    public function mount(Role $role){
        $this->role = $role;
        $this->selectedPermissions = $role->permissions()->get()->pluck('name')->toArray();
    }

    public function rules(){
        return [
            'role.name' => ['required','string',Rule::unique('roles','name')->ignore($this->role->id)],
            'role.description' => ['required','string'],
            'selectedPermissions' => ['required' , 'array' , Rule::in(Permission::all()->pluck('name')->toArray())]
        ];
    }

    public function updated($field){
        $this->validateOnly($field,$this->rules());
    }

    public function edit(){
        $this->validate($this->rules());
        $this->role->save();
        $this->role->syncPermissions($this->selectedPermissions);
        $this->redirect(route('roles.index'));
    }

    public function render()
    {
        return view('livewire.role.edit')->extends('layouts.layout')->section('content');
    }
}
