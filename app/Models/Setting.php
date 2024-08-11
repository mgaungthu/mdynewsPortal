<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'portal_id',
        'key',
        'value',
    ];

    public function portal()
    {
        return $this->belongsTo(Portal::class);
    }
}
