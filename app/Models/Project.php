<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function generateSlug($name){
        return Str::slug($name, '-');
    }

    public function getName(){
        return $this->title;
    } 

    public function professionists():BelongsTo{
        return $this->belongsTo(Professionist::class);
    }
}