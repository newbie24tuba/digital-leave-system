<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use App\Models\GateLog;

class SecurityController extends Controller
{
    public function index()
    {
        // Approved students who have NOT exited yet
        $requests = LeaveRequest::where('status', 'approved')
            ->whereDoesntHave('gateLog')
            ->latest()
            ->get();

        // Students currently outside
        $outsideStudents = GateLog::with('leaveRequest.user')
            ->whereNotNull('exit_time')
            ->whereNull('return_time')
            ->latest()
            ->get();

        return view(
            'security-dashboard',
            compact(
                'requests',
                'outsideStudents'
            )
        );
    }

    public function markExited($id)
    {
        $request = LeaveRequest::findOrFail($id);

        GateLog::create([
            'leave_request_id' => $request->id,
            'security_officer_id' => auth()->id(),
            'exit_time' => now(),
        ]);

        return back()->with(
            'success',
            'Student exit recorded successfully.'
        );
    }

    public function markReturned($id)
    {
        $log = GateLog::findOrFail($id);

        $log->update([
            'return_time' => now(),
        ]);

        $leaveRequest = $log->leaveRequest;

        $leaveRequest->update([
            'status' => 'returned',
        ]);

        return back()->with(
            'success',
            'Student return recorded successfully.'
        );
    }
}