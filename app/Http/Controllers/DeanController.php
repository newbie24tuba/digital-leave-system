<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeaveRequest;

class DeanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $requests = LeaveRequest::with('user')
            ->when($search, function ($query) use ($search) {
                $query->whereHas('user', function ($q) use ($search) {
                    $q->where('admission_number', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->get();

        $total = LeaveRequest::count();

        $pending = LeaveRequest::where('status', 'pending')->count();

        $approved = LeaveRequest::where('status', 'approved')->count();

        $rejected = LeaveRequest::where('status', 'rejected')->count();

        return view(
            'dean-dashboard',
            compact(
                'requests',
                'search',
                'total',
                'pending',
                'approved',
                'rejected'
            )
        );
    }

    public function approve(Request $request, $id)
    {
        $leaveRequest = LeaveRequest::findOrFail($id);

        $leaveRequest->status = 'approved';
        $leaveRequest->dean_comment = $request->comment;
        $leaveRequest->approved_at = now();
        $leaveRequest->approved_by = auth()->id();

        $leaveRequest->save();

        return back()->with(
            'success',
            'Leave approved successfully.'
        );
    }

    public function reject($id)
    {
        $leaveRequest = LeaveRequest::findOrFail($id);

        $leaveRequest->status = 'rejected';

        $leaveRequest->save();

        return back()->with(
            'success',
            'Leave rejected successfully.'
        );
    }
}