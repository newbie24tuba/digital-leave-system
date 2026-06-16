<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Leave History
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto bg-white p-6 rounded shadow">

            <table border="1" cellpadding="10" width="100%">
                <thead>
                    <tr>
                        <th>Leave Type</th>
                        <th>Departure Date</th>
                        <th>Return Date</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($requests as $request)
                        <tr>
                            <td>{{ $request->leave_type }}</td>
                            <td>{{ $request->departure_date }}</td>
                            <td>{{ $request->return_date }}</td>
                            <td>{{ $request->status }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">
                                No leave requests found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</x-app-layout>