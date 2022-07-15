<?php

namespace App\Http\Livewire\FundIn;

use App\Models\FundIn;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Edit extends Component
{
    public FundIn $fundin;

    public function mount(FundIn $fundIn){
        $this->fundin = $fundIn;
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

    public function updated($field){
        $this->validateOnly($field,$this->rules());
    }

    public function edit(){
        $this->validate($this->rules());
        $this->fundin->save();
        $this->redirect(route('fund-ins.index'));
    }

    public function render()
    {
        return view('livewire.fund-in.edit')->extends('layouts.layout')->section('content');
    }
}
