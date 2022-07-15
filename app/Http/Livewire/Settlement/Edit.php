<?php

namespace App\Http\Livewire\Settlement;

use App\Models\FundIn;
use App\Models\Settlement;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Edit extends Component
{
    public Settlement $settlement;

    public function mount(Settlement $settlement){
        $this->settlement = $settlement;
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

    public function updated($field){
        $this->validateOnly($field,$this->rules());
    }

    public function edit(){
        $this->validate($this->rules());
        $this->settlement->save();
        $this->redirect(route('settlements.index'));
    }

    public function render()
    {
        return view('livewire.settlement.edit')->extends('layouts.layout')->section('content');
    }
}
