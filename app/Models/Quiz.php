<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Quiz extends Model
{
    use HasFactory, Searchable;
    protected $table = 'quizzes';
    protected $guarded = [];
    protected $fillable = [
        'judul',
        'desk_pekerjaan',
        'status',
    ];

    public function toSearchableArray()
    {
        return  [
            'soal' => $this->soal,
            'desk_pekerjaan' => $this->desk_pekerjaan
        ];
    }
}
