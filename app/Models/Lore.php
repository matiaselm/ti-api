<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lore extends Model
{
    use HasFactory;

    protected $fillable = ['faction_id', 'lore', 'population', 'leadership', 'disposition', 'government', 'quote', 'flavor_text'];

    public function faction() {
        return $this->belongsTo(Faction::class);
    }
}
