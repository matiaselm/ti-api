<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    protected $guarded  = ['id', 'created_at', 'updated_at'];
    protected $fillable = ['faction_id', 'level', 'name'];

    public function faction() {
        return $this->belongsTo(Faction::class);
    }
}
