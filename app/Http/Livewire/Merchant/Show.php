<?php

namespace App\Http\Livewire\Merchant;

use App\Models\User;
use Livewire\Component;

class Show extends Component
{
    public User $user;
    public string $merchant_type = 'merchant';
    public string $password = '';
    public string $company = '';
    public float $fund_out_rate = 0;
    public float $fund_in_rate = 0;
    public int $balance = 0;
    public string $settlement_method = 'No Settlement';

    public function mount(User $user){
        $this->user = $user;
        $this->user->status = 1;
        $this->company = $user->getData('company');
        $this->fund_in_rate = $user->getData('fund_in_commission');
        $this->fund_out_rate = $user->getData('fund_out_commission');
        $this->balance = $user->getData('balance');
        $this->merchant_type = $user->getData('merchant_type');
        $this->settlement_method = $user->getData('settlement_method');
    }
    public function render()
    {
        return view('livewire.merchant.show')->extends('layouts.layout')->section('content');
    }
}
