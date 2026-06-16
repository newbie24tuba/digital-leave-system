<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeaveRequest;
use Illuminate\Support\Facades\Auth;

class LeaveRequestController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'leave_type' => 'required',
            'departure_date' => 'required',
            'return_date' => 'required',
            'reason' => 'required',
        ]);

        LeaveRequest::create([
            'student_id' => Auth::id(),
            'leave_type' => $request->leave_type,
            'reason' => $request->reason,
            'departure_date' => $request->departure_date,
            'return_date' => $request->return_date,
            'status' => 'pending',
        ]);

        return redirect('/dashboard')
            ->with('success', 'Leave request submitted successfully!');
    }

    public function history()
    {
        $requests = LeaveRequest::where(
            'student_id',
            Auth::id()
        )->latest()->get();

        return view('leave-history', compact('requests'));
    }
}