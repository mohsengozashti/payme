<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int id
 * @property string order_number
 * @property string transaction_id
 * @property string customer_bank_name
 * @property string customer_bank_code
 * @property string account_name
 * @property string account_number
 * @property bool status
 * @property string update_by
 * @property int amount
 * @property int service_charge
 * @property int merchant_id
 * @property DateTime created_at
 * @property DateTime updated_at
 * @property DateTime|null completed_at
 * Class FundOut
 * @package App\Models
 * @method static FundOut find(int $id)
 * @method static orderBy(string $key, string $type)
 * @method static create(array $data)
 */
class FundOut extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_number','transaction_id','customer_bank_name','customer_bank_code','account_name','account_number','status','update_by','amount','service_charge','merchant_id','completed_at'
    ];
    protected $casts = [
        'completed_at' => 'datetime'
    ];
    public function merchant(): BelongsTo
    {
        return $this->belongsTo(User::class,'merchant_id');
    }
}
