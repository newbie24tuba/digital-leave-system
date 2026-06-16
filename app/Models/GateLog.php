<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GateLog extends Model
{
    protected $fillable = [
        'leave_request_id',
        'security_officer_id',
        'exit_time',
        'return_time',
    ];

    public function leaveRequest()
    {
        return $this->belongsTo(
            LeaveRequest::class,
            'leave_request_id'
        );
    }
}