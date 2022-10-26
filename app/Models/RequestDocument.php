<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestDocument extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function request_application()
    {
        return $this->hasMany(RequestApplication::class);
    }

    public function document()
    {
        return $this->belongsTo(Document::class);
    }
}
