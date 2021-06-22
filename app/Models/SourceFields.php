<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SourceFields extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'source_provider_id',
        'name',
        'data_type',
        'data_long',
        'description',
    ];
}
