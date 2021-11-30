<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitRate extends Model
{
    use HasFactory;

    protected $fillable = [
        'visit_type', 'rate', 'available',
    ];
}
