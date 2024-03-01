<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'm_users'; //mendefiniskan nama tabel yang digunakan oleh model ini
    protected $primaryKey = 'user_id'; //mendefiniskan primary key dari tabel yang digunakan

}
