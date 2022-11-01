<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purpose extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function request_applications()
    {
        return $this->hasMany(RequestApplication::class);
    }
}
