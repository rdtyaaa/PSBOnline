<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'current_address',
        'district_id',
        'city_id',
        'province_id',
        'phone_number',
        'mobile_number',
        'nationality',
        'date_of_birth',
        'place_of_birth_city',
        'place_of_birth_province_id',
        'gender',
        'marital_status',
        'religion_id',
        'user_id'
    ];

    protected $casts = [
        'date_of_birth' => 'datetime', // or 'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function religion()
    {
        return $this->belongsTo(Religion::class);
    }

    public function placeOfBirthProvince()
    {
        return $this->belongsTo(Province::class, 'place_of_birth_province_id');
    }
}
