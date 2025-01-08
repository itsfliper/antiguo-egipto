<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapElement extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type', 'description', 'map_id', 'size', 'position_x', 'position_y'];

    public function map()
    {
        return $this->belongsTo(Map::class, 'map_id');
    }

    public function assets()
    {
        return $this->hasMany(Asset::class, 'element_id');
    }
}