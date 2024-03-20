<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaRepetido extends Model
{
    use HasFactory;

    public function justifications()
    {
        return $this->hasMany(Justification::class);
    }
}
