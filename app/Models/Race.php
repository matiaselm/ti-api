<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created', 'updated_at'];

    public function tendency() {
        return $this->belongsTo(Tendency::class, 'tendency_id');
    }
}
