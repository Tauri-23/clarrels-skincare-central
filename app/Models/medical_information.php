<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medical_information extends Model
{
    use HasFactory;

    public function patients() {
        return $this->hasMany(patients::class, 'id', 'patient');
    }
}
