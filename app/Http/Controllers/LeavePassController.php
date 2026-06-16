<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use Barryvdh\DomPDF\Facade\Pdf;

class LeavePassController extends Controller
{
    public function generate($id)
    {
        $leave = LeaveRequest::with('user')
            ->findOrFail($id);

        $pdf = Pdf::loadView(
            'leave-pass',
            compact('leave')
        );

        return $pdf->download(
            'Leave-Pass-'.$leave->id.'.pdf'
        );
    }
}