<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\In;
use Livewire\Component;

class Edit extends Component
{

    public User $user;
    public array $roles = ['user'];
    public string $password = '';

    public function mount(User $user){
        $this->user = $user;
        $this->roles = $user->roles()->pluck('name')->toArray();
    }

    public function rules(){
        return [
            'user.first_name' => ['required','string'],
            'user.last_name' => ['required','string'],
            'user.username' => ['required','string',Rule::unique('users','username')->ignore($this->user->id)],
            'password' => ['nullable','string','min:6'],
            'user.status' => ['required',Rule::in([0,1])],
            'roles' => ['required','array',Rule::in('manager','user','merchant','payout','finance')]
        ];
    }

    public function updated($field){
        $this->validateOnly($field,$this->rules());
    }

    public function edit(){
        $this->validate($this->rules());
        if ($this->password != ''){
            $this->user->password = bcrypt($this->password);
        }
        $this->user->save();
        $this->user->assignRole($this->roles);
        $this->redirect(route('users.index'));
    }

    public function render()
    {
        return view('livewire.user.edit')->extends('layouts.layout')->section('content');
    }
}
