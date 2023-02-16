<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Professionist extends Model
{
    use HasFactory;

    protected $guarded = [];


    public static function generateSlug($nickname)
    {
        return Str::slug($nickname . '-');

    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function lead(): HasMany
    {
        return $this->HasMany(Lead::class);
    }

    public function project(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    public function technologies(): BelongsToMany
    {
        return $this->belongsToMany(Technology::class);
    }

    public function plans(): BelongsToMany
    {
        return $this->belongsToMany(Plan::class)->withPivot('subscription_start', 'subscription_end');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }
}
