<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public $table = 'articles';

    public $fillable = [
        'id',
        'title',
        'content',
    ];

    public static $rules = [
        
    ];
}
