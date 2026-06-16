<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class LeaveRequest extends Model
{
    protected $fillable = [
        'student_id',
        'leave_type',
        'reason',
        'departure_date',
        'return_date',
        'status',
        'approved_by',
        'rejection_reason',
    ];

    public function user()
    {
        return $this->belongsTo(
            User::class,
            'student_id'
        );
    }

    public function gateLog()
    {
        return $this->hasOne(
            \App\Models\GateLog::class,
            'leave_request_id'
        );
    }
}