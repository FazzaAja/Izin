<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Murid extends Model implements Authenticatable
{
    use AuthenticatableTrait, HasFactory;

    public $table = "murid";

    use HasFactory;

    

    protected $fillable = [
        'nama',
        'password',
        'nisn',
        'nipd',
        'kelas',
        'jurusan_id',
        'jk',
        'foto',
        'alamat',
        'phone',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function izin()
    {
        return $this->hasMany(Izin::class);
    }
}