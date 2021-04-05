<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'zipcode', 'city', 'address'];

    /**
     * location has many vaccinations, location belongs to 1 vaccination
     */

    public function vaccinations(): HasMany {
        return $this->hasMany(Vaccination::class);
    }
}
