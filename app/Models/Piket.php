<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Piket extends Authenticatable
{
    // use HasFactory;

    protected $table = 'piket';


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
