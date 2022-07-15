<?php

namespace App\Models;

use App\Core\Traits\HasData;
use DateTime;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * @property int id
 * @property string first_name
 * @property string last_name
 * @property string password
 * @property string username
 * @property bool status
 * @property DateTime created_at
 * @property DateTime updated_at
 * @property DateTime|null last_login
 * @property DateTime|null last_login_from
 * Class User
 * @package App\Models
 * @method static User find(int $id)
 * @method static orderBy(string $key, string $type)
 * @method static create(array $data)
 */

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, HasData;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'status',
        'last_login',
        'last_login_from',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login' => 'datetime'
    ];

    /**
     * Retrieves the `data` of this `user`
     * @return HasMany
     */
    public function data(): HasMany {
        return $this->hasMany(UserData::class);
    }

    public function getFullNameAttribute(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
