<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentModel extends Model
{
    use HasFactory;

    protected $table = 'contents';

    protected $fillable = [
        'title', 'description',
        'content', 'date', 'status',
        'category', 'url_path', 'image_path'
    ];
}
