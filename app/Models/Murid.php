<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    public $table = "murid";

    use HasFactory;

    protected $fillable = [
        'nama',
        'nisn',
        'nipd',
        'kelas',
        'jurusan_id',
        'jk',
        'foto',
        'alamat',
        'phone',
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}