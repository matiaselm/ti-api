<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = ['race_id', 'name', 'type', 'level', 'cost', 'combat', 'move', 'capacity'];
}
