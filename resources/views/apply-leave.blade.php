<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Apply Leave
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">

            <form method="POST" action="/leave-request">
                @csrf

                <div style="margin-bottom:15px;">
                    <label><strong>Leave Type</strong></label>
                    <select name="leave_type" style="width:100%;padding:10px;">
                        <option value="Weekend Leave">Weekend Leave</option>
                        <option value="Medical Leave">Medical Leave</option>
                        <option value="Emergency Leave">Emergency Leave</option>
                        <option value="Academic Leave">Academic Leave</option>
                    </select>
                </div>

                <div style="margin-bottom:15px;">
                    <label><strong>Departure Date</strong></label>
                    <input type="date" name="departure_date"
                           style="width:100%;padding:10px;">
                </div>

                <div style="margin-bottom:15px;">
                    <label><strong>Return Date</strong></label>
                    <input type="date" name="return_date"
                           style="width:100%;padding:10px;">
                </div>

                <div style="margin-bottom:15px;">
                    <label><strong>Reason</strong></label>
                    <textarea name="reason"
                              rows="5"
                              style="width:100%;padding:10px;"></textarea>
                </div>

                <button type="submit"
                        style="background:blue;color:white;padding:12px 25px;border:none;border-radius:5px;cursor:pointer;">
                    Submit Request
                </button>

            </form>

        </div>
    </div>
</x-app-layout>