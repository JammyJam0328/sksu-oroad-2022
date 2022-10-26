<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestApplication extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function campus()
    {
        return $this->belongsTo(Campus::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function request_document()
    {
        return $this->hasOne(RequestDocument::class);
    }


    public function student_status()
    {
        return $this->belongsTo(StudentStatus::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function purpose()
    {
        return $this->belongsTo(Purpose::class);
    }

    public function transaction_logs()
    {
        return $this->hasMany(TransactionLog::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }




    // 
    public function isPending() : bool
    {
        return $this->status_id == 1;
    }

    public function isApproved() : bool
    {
        return $this->status_id == 2;
    }

    public function paymentSubmitted() : bool
    {
        return $this->status_id == 4;
    }

    public function isForRelease() : bool
    {

        return $this->status_id == 5;
    }

    public function denied() : bool
    {
        return $this->status_id == 3;
    }

    public function inClearanceValidation() : bool
    {
        return $this->status_id == 8;
    }
}
