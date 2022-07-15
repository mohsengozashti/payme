<?php

namespace App\Http\Livewire\FundIn;

use App\Models\FundIn;
use Livewire\Component;

class Delete extends Component
{
    public FundIn $fundIn;
    public function mount(FundIn $fundIn){
        $this->fundIn = $fundIn;
    }
    public function show(){
        $this->dispatchBrowserEvent('show-alert');
    }
    public function delete(){
        $this->fundIn->delete();
        $this->dispatchBrowserEvent('refresh');
    }
    public function render()
    {
        return view('livewire.fund-in.delete');
    }
}
