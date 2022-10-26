<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function request_application()
    {
        return $this->belongsTo(RequestApplication::class);
    }

    public function proofs()
    {
        return $this->hasMany(Proof::class);
    }
}
