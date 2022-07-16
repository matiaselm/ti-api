<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    protected $guarded  = ['id', 'created_at', 'updated_at'];
    protected $fillable = ['faction_id', 'technology_type_id', 'level', 'name'];

    public function faction() {
        return $this->belongsTo(Faction::class);
    }

    public function type() {
        return $this->belongsTo(TechnologyType::class, 'technology_type_id');
    }

    public function prerequisites() {
        return $this->hasManyThrough(
            TechnologyType::class,
            TechnologyPrerequisite::class,
            'technology_id', // Foreign key on the prerequisites table
            'id', // Foreign key on the technologytypes table
            'id', // Local key on the technologies table
            'technology_id' // Local key on the prerequisites table
        );
    }
}
