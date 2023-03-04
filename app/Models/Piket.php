<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Piket extends Authenticatable
{
    public $table = "piket";

    use HasFactory;

    protected $fillable = [
        'nama',
        'nip',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function izin()
    {
        return $this->hasMany(Piket::class);
    }
}
