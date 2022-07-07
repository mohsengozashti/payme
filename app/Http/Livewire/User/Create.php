<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\In;
use Livewire\Component;

class Create extends Component
{

    public User $user;
    public array $roles = ['user'];
    public string $password = '';

    public function mount(){
        $this->user = new User();
        $this->user->status = 1;
    }

    public function rules(){
        return [
            'user.first_name' => ['required','string'],
            'user.last_name' => ['required','string'],
            'user.username' => ['required','string','unique:users,username'],
            'password' => ['required','string','min:6'],
            'user.status' => ['required',Rule::in([0,1])],
            'roles' => ['required','array',Rule::in('manager','user','merchant','payout','finance')]
        ];
    }

    public function updated($field){
        $this->validateOnly($field,$this->rules());
    }

    public function create(){
        $this->validate($this->rules());
        dd($this->user,$this->roles,$this->password);
        $this->user->password = bcrypt($this->password);
        $this->user->save();
        $this->user->assignRole($this->roles);
        $this->redirect(route('users.index'));
    }

    public function render()
    {
        return view('livewire.user.create')->extends('layouts.layout')->section('content');
    }
}
