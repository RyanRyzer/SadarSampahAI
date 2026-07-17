<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detection extends Model
{
    protected $table = 'detections';

    protected $fillable = [
        'user_id',
        'category_id',
        'image',
        'confidence'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}