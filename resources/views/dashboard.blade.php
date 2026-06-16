<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            TTC Leave Management System
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if(session('success'))
                    <div style="background:#d4edda;color:#155724;padding:10px;margin-bottom:15px;border-radius:5px;">
                        {{ session('success') }}
                    </div>
                @endif

                <h1 class="text-2xl font-bold mb-4">
                    Welcome {{ Auth::user()->name }}
                </h1>

                <div style="margin-top:20px;">

                    <a href="/apply-leave"
                       style="background:blue;color:white;padding:15px;display:inline-block;text-decoration:none;border-radius:5px;">
                        APPLY LEAVE
                    </a>

                    <a href="/leave-history"
                       style="background:green;color:white;padding:15px;display:inline-block;margin-left:10px;text-decoration:none;border-radius:5px;">
                        LEAVE HISTORY
                    </a>

                </div>

                <div class="mt-8">

                   <p>
    <strong>Pending Requests:</strong>
    {{ $pending }}
</p>

<p>
    <strong>Approved Requests:</strong>
    {{ $approved }}
</p>

<p>
    <strong>Rejected Requests:</strong>
    {{ $rejected }}
</p>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>