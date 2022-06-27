<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    use HasFactory;

    protected $guarded  = ['id', 'created_at', 'updated_at'];
    protected $fillable = ['faction_id', 'anomaly_id', 'number'];

    public function planets() {
        return $this->hasMany(Planet::class);
    }

    public function anomaly() {
        return $this->belongsTo(Anomaly::class);
    }

    public function faction() {
        return $this->belongsTo(Faction::class);
    }

}
