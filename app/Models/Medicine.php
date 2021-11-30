<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'code', 'type', 'rate_per_unit', 'quantity', 'in_stock', 'expiry_date',
    ];
}
