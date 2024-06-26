<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
// use Illuminate\Contracts\Auth\Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserModel extends Authenticatable implements JWTSubject
{

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
    protected $table = 'm_users';
    protected $primaryKey = 'user_id';
    protected $fillable =
        [
            'level_id',
            'username',
            'nama',
            'password',
            'image'//tambahan
        ];
    public function level()
    {
        return $this->belongsTo(
            LevelModel::class,
            'level_id',
            'level_id'
        );
    }
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn($image) => url('/storage/posts/' . $image),
        );
    }

}

// class UserModel extends Model implements Authenticatable
// {
//     use HasFactory;

//     protected $table = "m_users";
//     protected $primaryKey = "user_id";

//     protected $fillable =
//         [
//             'level_id',
//             'username',
//             'nama',
//             'password'
//         ];

//     public function level(): BelongsTo
//     {
//         return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
//     }

//     public function stok(): HasMany
//     {
//         return $this->hasMany(StokModel::class, 'user_id', 'user_id');
//     }

//     public function transaksi(): HasMany
//     {
//         return $this->hasMany(PenjualanModel::class, 'user_id', 'user_id');
//     }

//     public function updatedTransaksi(): HasMany
//     {
//         return $this->hasMany(PenjualanModel::class, 'updated_by', 'user_id');
//     }
//     public function getAuthIdentifierName()
//     {
//         return 'user_id';
//     }

//     public function getAuthIdentifier()
//     {
//         return $this->user_id;
//     }

//     public function getAuthPassword()
//     {
//         return $this->password;
//     }

//     public function getRememberToken()
//     {
//         return $this->remember_token;
//     }

//     public function setRememberToken($value)
//     {
//         $this->remember_token = $value;
//     }

//     public function getRememberTokenName()
//     {
//         return 'remember_token';
//     }
// }