<?php

namespace App\Models\Address;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subdistrict extends Model
{
    use HasFactory;

    protected $table = 'subdistricts';
    protected $primaryKey = 'subdistrict_id';
}
