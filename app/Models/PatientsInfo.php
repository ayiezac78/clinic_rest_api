<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientsInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id',
        'appointment_date',
        'schedule_time',
        'first_name',
        'last_name',
        'age',
        'gender',
        'contact_number',
        'email_address',
        'address',
        'medical_concern'
    ];
}
