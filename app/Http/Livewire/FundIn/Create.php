<?php

namespace App\Http\Livewire\FundIn;

use App\Models\FundIn;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\In;
use Livewire\Component;

class Create extends Component
{
    public FundIn $fundin;
    public function mount(){
        $this->fundin = new FundIn();
        $this->fundin->status = 2;
        $this->fundin->update_by = 'manual';
    }

    public function rules(){
        return [
            'fundin.order_number' => ['required','string'],
            'fundin.transaction_id' => ['required','string'],
            'fundin.merchant_id' => ['required','exists:users,id'],
            'fundin.customer_bank_name' => ['required','string'],
            'fundin.customer_bank_code' => ['required','string'],
            'fundin.status' => ['required',Rule::in([0,1,2])],
            'fundin.update_by' => ['required',Rule::in(['auto','manual'])],
            'fundin.requested_amount' => ['required','numeric'],
            'fundin.fund_in_commission' => ['required','numeric'],
        ];
    }

    public function updated($field,$val){
        $this->validateOnly($field,$this->rules());
    }

    public function create(){
        $this->validate($this->rules());
        $this->fundin->save();
        $this->dispatchBrowserEvent('refresh');
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->fundin = new FundIn();
        $this->dispatchBrowserEvent('reset');
        $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.fund-in.create');
    }
}
