<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipts extends Model
{
    use HasFactory;

    public function appointments() {
        return $this->belongsTo(Appointments::class, 'appointment', 'id');
    }
}
