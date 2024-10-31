<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Regency;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function cities()
    {
        return $this->hasMany(City::class); // Relasi ke model Regency
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}
