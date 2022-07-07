<?php

namespace App\Http\Livewire\Merchant;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Create extends Component
{
    public User $user;
    public string $merchant_type = 'merchant';
    public string $password = '';
    public string $company = '';
    public float $fund_out_rate = 0;
    public float $fund_in_rate = 0;
    public int $balance = 0;
    public string $settlement_method = 'No Settlement';

    public function mount(){
        $this->user = new User();
        $this->user->status = 1;
    }

    public function rules(){
        return [
            'user.first_name' => ['required','string'],
            'user.last_name' => ['required','string'],
            'user.username' => ['required','string','unique:users,username'],
            'company' => ['required','string'],
            'fund_out_rate' => ['required','numeric','min:0','max:100'],
            'fund_in_rate' => ['required','numeric','min:0','max:100'],
            'merchant_type' => ['required','string',Rule::in(['Merchant'])],
            'settlement_type' => ['required','string',Rule::in(['Seamless','No Settlement'])],
            'balance' => ['required','numeric'],
            'password' => ['required','string','min:6'],
            'user.status' => ['required',Rule::in([0,1])],
        ];
    }


    public function updated($field){
        $this->validateOnly($field,$this->rules());
    }


    public function create(){
        $this->validate($this->rules());
        $this->user->password = bcrypt($this->password);
        $this->user->save();
        $this->user->setData('company',$this->company);
        $this->user->setData('balance',$this->balance);
        $this->user->setData('merchant_type',$this->merchant_type);
        $this->user->setData('settlement_method',$this->settlement_method);
        $this->user->setData('fund_out_commission',$this->fund_out_rate);
        $this->user->setData('fund_in_commission',$this->fund_in_rate);
        $this->user->assignRole('merchant');
        $this->redirect(route('merchants.index'));
    }


    public function render()
    {
        return view('livewire.merchant.create')->extends('layouts.layout')->section('content');
    }
}
