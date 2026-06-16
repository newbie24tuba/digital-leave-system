<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dean Approval Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div style="max-width:1200px;margin:auto;margin-bottom:20px;">
    <div style="
        background:linear-gradient(135deg,#1e3a8a,#2563eb);
        padding:25px;
        border-radius:10px;
        color:white;
    ">
        <h1 style="font-size:30px;font-weight:bold;margin:0;">
            Dean Approval Dashboard
        </h1>

        <p style="margin-top:10px;">
            Manage student leave requests, approvals and rejections.
        </p>
    </div>
</div>
        <div class="max-w-7xl mx-auto bg-white p-6 rounded shadow">

            <div style="
display:flex;
gap:20px;
margin-bottom:30px;
flex-wrap:wrap;
">

    <div style="
    background:#2563eb;
    color:white;
    padding:20px;
    border-radius:12px;
    min-width:180px;
    box-shadow:0 4px 10px rgba(0,0,0,0.2);
    ">
        <h3>Total Requests</h3>
        <h1 style="font-size:32px;">{{ $total }}</h1>
    </div>

    <div style="
    background:#f59e0b;
    color:white;
    padding:20px;
    border-radius:12px;
    min-width:180px;
    box-shadow:0 4px 10px rgba(0,0,0,0.2);
    ">
        <h3>Pending</h3>
        <h1 style="font-size:32px;">{{ $pending }}</h1>
    </div>

    <div style="
    background:#10b981;
    color:white;
    padding:20px;
    border-radius:12px;
    min-width:180px;
    box-shadow:0 4px 10px rgba(0,0,0,0.2);
    ">
        <h3>Approved</h3>
        <h1 style="font-size:32px;">{{ $approved }}</h1>
    </div>

    <div style="
    background:#ef4444;
    color:white;
    padding:20px;
    border-radius:12px;
    min-width:180px;
    box-shadow:0 4px 10px rgba(0,0,0,0.2);
    ">
        <h3>Rejected</h3>
        <h1 style="font-size:32px;">{{ $rejected }}</h1>
    </div>

</div>

                

            <form method="GET" action="/dean-dashboard" style="margin-bottom:20px;">

                <input
                    type="text"
                    name="search"
                    value="{{ $search ?? '' }}"
                    placeholder="Search admission number..."
                    style="padding:8px;width:300px;border:1px solid #ccc;border-radius:5px;"
                >

                <button
                    type="submit"
                    style="background:blue;color:white;padding:8px 15px;border:none;border-radius:5px;">
                    Search
                </button>

            </form>

            <table
style="
width:100%;
border-collapse:collapse;
background:white;
border-radius:10px;
overflow:hidden;
box-shadow:0 4px 10px rgba(0,0,0,0.1);
">
              <thead style="background:#1e3a8a;color:white;">
    <tr>
                        <th>Student</th>
                        <th>Leave Type</th>
                        <th>Departure</th>
                        <th>Return</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($requests as $request)
                        <tr>

                            <td>
    <strong>{{ $request->user->name }}</strong>
    <br>
    Admission No: {{ $request->user->admission_number }}
</td>

                            <td>{{ $request->leave_type }}</td>

                            <td>{{ $request->departure_date }}</td>

                            <td>{{ $request->return_date }}</td>

                            <td>

                                @if($request->status == 'pending')
                                    <span style="background:orange;color:white;padding:5px 10px;border-radius:5px;">
                                        Pending
                                    </span>
                                @endif

                                @if($request->status == 'approved')
                                    <span style="background:green;color:white;padding:5px 10px;border-radius:5px;">
                                        Approved
                                    </span>
                                @endif

                                @if($request->status == 'rejected')
                                    <span style="background:red;color:white;padding:5px 10px;border-radius:5px;">
                                        Rejected
                                    </span>
                                @endif

                            </td>

                            <td>

                               <form action="/approve/{{ $request->id }}" method="GET">

```
<textarea
    name="comment"
    placeholder="Dean comment..."
    style="
    width:100%;
    padding:8px;
    border:1px solid #ccc;
    border-radius:5px;
    margin-bottom:5px;
    "
></textarea>

<button
    type="submit"
    style="
    background:green;
    color:white;
    padding:5px 10px;
    border:none;
    border-radius:5px;
    ">
    Approve
</button>
```

<td>

```
<form action="/approve/{{ $request->id }}" method="POST">
    @csrf

    <textarea
        name="comment"
        placeholder="Dean comment..."
        style="
        width:100%;
        padding:8px;
        border:1px solid #ccc;
        border-radius:5px;
        margin-bottom:5px;
        "
    ></textarea>

    <button
        type="submit"
        style="
        background:green;
        color:white;
        padding:6px 12px;
        border:none;
        border-radius:5px;
        ">
        Approve
    </button>
</form>

<br>

<a href="/reject/{{ $request->id }}"
   style="
   background:red;
   color:white;
   padding:6px 12px;
   text-decoration:none;
   border-radius:5px;
   ">
    Reject
</a>
```

</td>


                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</x-app-layout>