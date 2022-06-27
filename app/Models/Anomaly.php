<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anomaly extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $fillable = ['type'];

    protected $appends = ['is_anomaly'];

    public function systems() {
        return $this->hasMany(System::class);
    }

    public function anomaly() {
        return $this->belongsTo(Anomaly::class);
    }

    public function effects() {
        return $this->hasMany(AnomalyEffect::class);
    }

    public function getIsAnomalyAttribute() {
        return $this->anomaly()->exists();
    }
}
