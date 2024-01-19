<?php

namespace App\Models;

use App\Events\OrderPlaced;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'content'];
    // web.php 一樣
    // OrderPlaced::dispatch($post);
    protected $dispatchesEvents = [
        'created'=> OrderPlaced::class
    ];
}
