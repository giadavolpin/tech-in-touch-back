<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Vote extends Model
{
    use HasFactory;

    public function professionists():BelongsToMany{
        return $this->belongsToMany(Professionist::class)->withPivot('comment');
    }
}
