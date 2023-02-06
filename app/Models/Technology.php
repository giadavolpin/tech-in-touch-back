<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Technology extends Model
{
    use HasFactory;


    public static function generateSlug($name){
        return Str::slug($name, '-');

    }

    public function professionists():BelongsToMany{
        return $this->belongsToMany(Professionist::class);
    }
}
