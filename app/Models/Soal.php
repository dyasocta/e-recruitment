<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Soal extends Model
{
    use HasFactory, Searchable;
    protected $table = 'soal';
    protected $guarded = [];
    protected $fillable = [
        'soal',
        'pil_a',
        'pil_b',
        'pil_c',
        'pil_d',
        'pil_e',
        'jawaban',
    ];

    public function toSearchableArray()
    {
        return  [
            'soal' => $this->soal,
            'pil_a' => $this->pil_a,
            'pil_b' => $this->pil_b,
            'pil_c' => $this->pil_c,
            'pil_d' => $this->pil_d,
            'pil_e' => $this->pil_e,
            'jawaban' => $this->jawaban
        ];
    }
}
