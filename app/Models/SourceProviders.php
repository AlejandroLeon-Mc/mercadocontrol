<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SourceProviders extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'short_name',
        'name',
        'nosotros',
    ];

     public function scopeProvider($query,$name)
    {
        return $query->where('name','LIKE',"%$name%")->orWhere('short_name','LIKE',"%$name%");
    }
}
