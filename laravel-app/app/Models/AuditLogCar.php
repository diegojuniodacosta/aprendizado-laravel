<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditLogCar extends Model
{
    use HasFactory;

    protected $table = 'audit_log_car';

    protected $fillable = [
        'action',
        'user_name',
        'description',
    ];
}
