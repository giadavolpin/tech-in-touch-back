<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Plan extends Model
{
    use HasFactory;

    public function professionists(): BelongsToMany
    {
        return $this->belongsToMany(Professionist::class)->withPivot('id', 'plan_id', 'professionist_id', 'subscription_start', 'subscription_end');
    }
}
