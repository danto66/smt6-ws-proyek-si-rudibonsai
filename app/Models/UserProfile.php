<?php

namespace App\Models;

use App\Models\Address\City;
use App\Models\Address\Province;
use App\Models\Address\Subdistrict;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'phone',
        'gender',
        'address_detail',
        'province_id',
        'city_id',
        'subdistrict_id',
        'profile_picture',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'province_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'city_id');
    }

    public function subdistrict()
    {
        return $this->belongsTo(Subdistrict::class, 'subdistrict_id', 'subdistrict_id');
    }
}
