<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    protected $fillable = [
        'portal_id',
        'name',
        'slug',
    ];

    public function portal()
    {
        return $this->belongsTo(Portal::class);
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
