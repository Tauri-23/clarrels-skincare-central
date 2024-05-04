<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    use HasFactory;

    //Foreign keys
    public function patients() {
        return $this->hasMany(patients::class, 'id', 'patient');
    }

    public function doctors() {
        return $this->hasMany(Doctors::class, 'id', 'doctor');
    }
}
