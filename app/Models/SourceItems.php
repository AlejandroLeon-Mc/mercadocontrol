<?php

namespace App\Models;

use App\Scopes\AncientScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SourceItems extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'source_provider_id',
        'json',
        'ean',
    ];


    public function provider()
    {
    	//return $this->hasMany(SourceProviders::class,'id','source_providers_id');
        return $this->belongsTo(SourceProviders::class,'source_providers_id');
    }


    public function scopeItem($query,$barcode)
    {
        return $query->where('ean','LIKE',"%$barcode%");
    }

    
}
