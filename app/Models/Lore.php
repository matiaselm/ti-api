<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lore extends Model
{
    use HasFactory;

    protected $fillable = ['race_id', 'lore', 'population', 'leadership', 'disposition', 'government', 'quote', 'flavor_text'];

    public function race() {
        return $this->belongsTo(Race::class);
    }
}
