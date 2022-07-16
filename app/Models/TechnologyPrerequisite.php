<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechnologyPrerequisite extends Model
{
    use HasFactory;

    protected $fillable = ['technology_id', 'technology_type_id'];

    public function technology() {
        return $this->belongsTo(Technology::class);
    }

    public function technologyType() {
        return $this->belongsTo(TechnologyType::class);
    }
}
