<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'theme'];

    public function elements()
    {
        return $this->hasMany(MapElement::class, 'map_id');
    }
}