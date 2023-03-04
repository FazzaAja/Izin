<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Izin extends Model
{
    public $table = "izin";

    use HasFactory;

    protected $fillable = [
        'murid_id',
        'alasan',
        'keluar',
        'kembali',
        'status',
        'piket_id',
    ];

    public function murid()
    {
        return $this->belongsTo(Murid::class);
    }

    public function piket()
    {
        return $this->belongsTo(Piket::class);
    }
}
