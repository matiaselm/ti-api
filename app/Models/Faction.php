<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faction extends Model
{
    use HasFactory;

    protected $guarded  = ['id', 'created', 'updated_at'];
    protected $fillable = ['image_url', 'name', 'tendency_id', 'commodities', 'tendency'];

    protected $appends = ['planets_count'];

    public function systems() {
        return $this->hasMany(System::class);
    }

    public function tendency() {
        return $this->belongsTo(Tendency::class, 'tendency_id');
    }

    public function lore() {
        return $this->hasOne(Lore::class);
    }

    public function getPlanetsCountAttribute() {
        $sum = 0;
        foreach($this->systems as $system) {
            $sum += $system->planets->count();
        }
        return $sum;
    }
}
