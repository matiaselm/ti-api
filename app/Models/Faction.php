<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faction extends Model
{
    use HasFactory;

    protected $guarded  = ['id', 'created', 'updated_at'];
    protected $fillable = ['name', 'tendency_id', 'commodities', 'tendency'];

    public function tendency() {
        return $this->belongsTo(Tendency::class, 'tendency_id');
    }

    public function lore() {
        return $this->hasOne(Lore::class);
    }
}
