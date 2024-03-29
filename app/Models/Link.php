<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int id
 * @property string unique_id
 * @property string customer_name
 * @property string wallet_address
 * @property bool with_qr_code
 * @property float amount
 * @property int merchant_id
 * @property DateTime created_at
 * @property DateTime updated_at

 * Class FundIn
 * @package App\Models
 * @method static FundIn find(int $id)
 * @method static orderBy(string $key, string $type)
 * @method static create(array $data)
 */
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
