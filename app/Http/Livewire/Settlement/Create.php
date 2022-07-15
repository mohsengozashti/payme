<?php

namespace App\Http\Livewire\Settlement;

use App\Models\Settlement;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\In;
use Livewire\Component;

class Create extends Component
{
    public Settlement $settlement;
    public function mount(){
        $this->settlement = new Settlement();
        $this->settlement->status = 2;
        $this->settlement->update_by = 'bot';
    }

    public function rules(){
        return [
            'settlement.order_number' => ['required','string'],
            'settlement.transaction_id' => ['required','string'],
            'settlement.settlement_id' => ['required','string'],
            'settlement.merchant_id' => ['required','exists:users,id'],
            'settlement.customer_bank_name' => ['required','string'],
            'settlement.customer_bank_code' => ['required','string'],
            'settlement.account_name' => ['required','string'],
            'settlement.account_number' => ['required','string'],
            'settlement.remark' => ['required','string'],
            'settlement.status' => ['required',Rule::in([0,1,2])],
            'settlement.update_by' => ['required',Rule::in(['bot','1001'])],
            'settlement.amount' => ['required','numeric'],
        ];
    }

    public function updated($field,$val){
        $this->validateOnly($field,$this->rules());
    }

    public function create(){
        $this->validate($this->rules());
        $this->settlement->save();
        $this->dispatchBrowserEvent('refresh');
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->settlement = new Settlement();
        $this->dispatchBrowserEvent('reset');
        $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.settlement.create');
    }
}
