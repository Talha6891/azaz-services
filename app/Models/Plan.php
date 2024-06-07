<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'duration', 'duration_unit', 'status', 'number_of_visits'];

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'plan_services');
    }
}
