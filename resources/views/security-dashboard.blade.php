<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Security Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto bg-white p-6 rounded shadow">

            @if(session('success'))
                <div style="background:#d4edda;color:#155724;padding:10px;margin-bottom:15px;border-radius:5px;">
                    {{ session('success') }}
                </div>
            @endif

            <h2 style="font-size:20px;font-weight:bold;margin-bottom:15px;">
                Approved Students Waiting to Exit
            </h2>

            <table border="1" cellpadding="10" width="100%" style="margin-bottom:40px;">
                <thead>
                    <tr>
                        <th>Student</th>
                        <th>Admission No</th>
                        <th>Leave Type</th>
                        <th>Departure Date</th>
                        <th>Return Date</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($requests as $request)
                        <tr>
                            <td>{{ $request->user->name }}</td>
                            <td>{{ $request->user->admission_number }}</td>
                            <td>{{ $request->leave_type }}</td>
                            <td>{{ $request->departure_date }}</td>
                            <td>{{ $request->return_date }}</td>

                            <td>
                                <a href="/mark-exited/{{ $request->id }}"
                                   style="background:blue;color:white;padding:5px 10px;text-decoration:none;border-radius:4px;">
                                    Mark Exited
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">
                                No approved students waiting to exit.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <h2 style="font-size:20px;font-weight:bold;margin-bottom:15px;">
                Students Currently Outside
            </h2>

            <table border="1" cellpadding="10" width="100%">
                <thead>
                    <tr>
                        <th>Student</th>
                        <th>Admission No</th>
                        <th>Leave Type</th>
                        <th>Exit Time</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($outsideStudents as $log)
                        <tr>
                            <td>{{ $log->leaveRequest->user->name }}</td>
                            <td>{{ $log->leaveRequest->user->admission_number }}</td>
                            <td>{{ $log->leaveRequest->leave_type }}</td>
                            <td>{{ $log->exit_time }}</td>

                            <td>
                                <a href="/mark-returned/{{ $log->id }}"
                                   style="background:green;color:white;padding:5px 10px;text-decoration:none;border-radius:4px;">
                                    Mark Returned
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                No students currently outside.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</x-app-layout>