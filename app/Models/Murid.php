<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    public $table = "murid";

    use HasFactory;

    protected $fillable = [
        'nis',
        'foto',
        'nama',
        'kelas',
        'jurusan_id',
        'alamat',
        'phone',
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}