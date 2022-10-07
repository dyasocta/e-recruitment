<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Lowongan extends Model
{
    use HasFactory, Searchable;

    protected $table = 'lowongan';
    protected $guarded = [];
    protected $fillable = [
        'nama_pt',
        'lokasi',
        'minimal_jenjang',
        'kategori',
        'js_kelamin',
        'mask_usia',
        'keahlian',
        'pengalaman',
        'desk_pekerjaan',
        'hari_kerja',
        'jam_kerja',
        'status',
    ];
    public function toSearchableArray()
    {
        return [
            'nama_pt' => $this->nama_pt,
            'lokasi' => $this->lokasi,
            'minimal_jenjang' => $this->minimal_jenjang,
            'kategori' => $this->kategori,
            'keahlian' => $this->keahlian
        ];
    }
}
