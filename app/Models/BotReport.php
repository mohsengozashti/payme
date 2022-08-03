<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string order_number
 * @property string transaction_id
 * @property string bank_name
 * @property float amount
 * @property DateTime date
 * @property DateTime created_at
 * @property DateTime updated_at

 * Class FundIn
 * @package App\Models
 * @method static FundIn find(int $id)
 * @method static orderBy(string $key, string $type)
 * @method static create(array $data)
 */
class BotReport extends Model
{
    use HasFactory;
    protected $fillable = [
        'amount','date','bank_name','order_number','transaction_id'
    ];
}
