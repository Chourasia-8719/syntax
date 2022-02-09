<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'comment',
        'news_id',
    ];

    public function news(){
        return $this->belongsTo(\App\Models\News::class);
    }
}
