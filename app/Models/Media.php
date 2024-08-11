<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;


    protected $fillable = [
        'portal_id',
        'file_name',
        'file_path',
        'file_type',
        'uploaded_at',
    ];

    public function portal()
    {
        return $this->belongsTo(Portal::class);
    }
}
