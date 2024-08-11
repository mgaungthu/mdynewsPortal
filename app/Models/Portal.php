<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portal extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'title',
        'description',
        'banner_image',
        'logo',
        'theme',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function settings()
    {
        return $this->hasMany(Setting::class);
    }

    public function media()
    {
        return $this->hasMany(Media::class);
    }
}
