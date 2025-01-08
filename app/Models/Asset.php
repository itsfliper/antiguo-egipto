<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type', 'path', 'element_id', 'size'];

    public function element()
    {
        return $this->belongsTo(MapElement::class, 'element_id');
    }
}