<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'details',
        'language_id'
    ];

    public function tags(){
        return $this->belongsToMany(Tag::class,'tag_translations');
    }

    public function languages(){
        return $this->belongsTo(Language::class,'language_id','id');
    }
}
