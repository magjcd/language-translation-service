<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag_name'
    ];
    
    public function translations(){
        return $this->belongsToMany(Translation::class,'tag_translations');
    }
}
