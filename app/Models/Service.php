<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['category_id','name','description','price'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function plans(): BelongsToMany
    {
        return $this->belongsToMany(Plan::class, 'plan_services');
    }

}
