<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketplaceFields extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'marketplace_id',
        'name',
        'data_type',
        'data_long',
    ];
}
