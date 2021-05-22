<?php

namespace App\Models;

use Faker\Provider\Image;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vaccination extends Model
{
    use HasFactory;

    protected $fillable = ['dateOfVaccination', 'fromTime', 'toTime', 'maxParticipants', 'location_id'];

    public function location(): BelongsTo {
        return $this->belongsTo(Location::class);
    }

    public function users(): HasMany {
        return $this->hasMany(User::class);
    }
}
