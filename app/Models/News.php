<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable = [
        'source',
        'author',
        'title',
        'description',
        'url',
        'urlToImage',
        'content','publishedAt'
    ];
    protected $table = 'news';
    
    public $timestamps = true;

    protected $dates = [ 'publishedAt'];

    public function comments(){
        return $this->hasMany(\App\Models\Comment::class);
    }
}
