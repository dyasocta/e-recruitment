<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Pengumuman extends Model
{
    use HasFactory, Searchable;
    protected $table = 'pengumuman';
    protected $guarded = [];
    protected $fillable = [
        'judul',
        'desk_pekerjaan',
        'status',
    ];

    public function toSearchableArray()
    {
        return  [
            'judul' => $this->judul,
            'desk_pekerjaan' => $this->desk_pekerjaan
        ];
    }
}
