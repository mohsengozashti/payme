<?php

namespace App\Http\Livewire\Link;

use App\Models\Link;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\In;
use Livewire\Component;

class Create extends Component
{
    public Link $link;
    public bool $is_link_created = false;
    public function mount(){
        $this->link = new Link();
    }

    public function rules(){
        return [
            'link.merchant_id' => ['required','exists:users,id'],
            'link.bank_name' => ['required','string'],
            'link.wallet_address' => ['nullable','string'],
            'link.customer_name' => ['required','string'],
            'link.with_qr_code' => ['required','boolean'],
            'link.amount' => ['required','numeric'],
            'link.expiration_duration' => ['required','numeric'],
        ];
    }

    public function updated($field){
        $this->validateOnly($field,$this->rules());
    }

    public function create(){
        $this->validate($this->rules());
        $this->link->unique_id = uniqid();
        do{
            $this->link->amount = number_format($this->link->amount - number_format((float)rand() / (float)getrandmax(),2) / 100,4);
        }while( Link::where('merchant_id',$this->link->merchant_id)->where('amount',$this->link->amount)->get()->count() != 0 );
        $this->link->save();
        $this->is_link_created = true;
    }

    public function resetForm()
    {
        $this->link = new Link();
        $this->is_link_created = false;
        $this->dispatchBrowserEvent('resetLinkModal');
        $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.link.create');
    }
}
