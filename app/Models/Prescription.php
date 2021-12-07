<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'visit_id', 'medicine_code', 'strength', 'dose', 'quantity', 'amount', 'issuance', 'prescribed_by', 'issued_by',
    ];

    public function visits(){
        return $this->belongsTo(Visit::class);
    }

    public function medicines(){
        return $this->belongsTo(Medicine::class);
    }

    public function admins(){
        return $this->belongsTo(Admin::class);
    }
}
