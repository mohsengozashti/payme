<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Link extends Model
{
    use HasFactory;
    protected $fillable = [
        'merchant_id','amount','customer_name','with_qr_code','wallet_address','unique_id'
    ];


    public function merchant(): BelongsTo
    {
        return $this->belongsTo(User::class,'merchant_id');
    }
}
