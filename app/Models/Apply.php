<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Apply extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'apply_user_id',
        'user_id',
        'rekutmen',
        'lokasi',
        'Tgl-Apply',
        'status'
    ];

    public function user()
    {
        return $this->hasOne('User', 'apply_user_id');
    }
}
