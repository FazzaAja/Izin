<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    public $table = 'jurusan';

    use HasFactory;

    protected $fillable = [
        'jurusan',
    ];

    public function murid()
    {
        return $this->hasMany(Murid::class);
    }

}
