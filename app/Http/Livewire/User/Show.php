<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class Show extends Component
{
    public User $user;
    public array $roles = ['user'];
    public string $password = '';

    public function mount(User $user){
        $this->user = $user;
        $this->roles = $user->roles()->pluck('name')->toArray();
    }

    public function render()
    {
        return view('livewire.user.show')->extends('layouts.layout')->section('content');
    }
}
