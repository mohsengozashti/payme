<?php

namespace App\Http\Livewire\Link;

use App\Models\Link;
use Livewire\Component;

class Show extends Component
{
    public Link $link;
    public function mount(Link $link){
        if (now() > $link->created_at->addMinutes($link->expiration_duration)){
            return abort('404');
        }else{
            $this->link = $link;
        }
    }

    public function render()
    {
        return view('livewire.link.show')->extends('layouts.auth')->section('content');
    }
}
