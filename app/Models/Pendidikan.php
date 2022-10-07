<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;

    public function user()
    {
       return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'jenjang',
        'institusi',
        'jurusan',
        'kota',
        'tanggal_lulus',
        'nilai_uan_ipk',
        'akreditasi'

    ];
}
