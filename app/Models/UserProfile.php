<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'phone',
        'gender',
        'address_detail',
        'provinsi_id',
        'kabupaten_id',
        'kecamatan_id',
        'profile_picture',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
