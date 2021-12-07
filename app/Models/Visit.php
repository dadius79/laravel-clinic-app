<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id', 'consultation', 'doctor_id', 'over_the_counter', 'status', 'created_by'
    ];

    public function patients(){
        return $this->belongsTo(Patient::class);
    }

    public function doctors(){
        return $this->belongsTo(Admin::class, 'doctor_id');
    }

    public function admins(){
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function consultations(){
        return $this->hasMany(Consultation::class);
    }

    public function prescriptions(){
        return $this->hasMany(Prescription::class);
    }

    public function billings(){
        return $this->hasMany(Billing::class);
    }

}
