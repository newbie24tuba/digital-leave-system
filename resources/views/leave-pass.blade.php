<!DOCTYPE html>
<html>
<head>
    <title>Leave Pass</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            padding:30px;
        }

        .header{
            text-align:center;
            margin-bottom:30px;
        }

        .title{
            font-size:24px;
            font-weight:bold;
        }

        .box{
            border:1px solid #000;
            padding:20px;
            margin-top:20px;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        td{
            padding:10px;
            border:1px solid #ddd;
        }

        .footer{
            margin-top:50px;
        }
    </style>
</head>
<body>

    <div class="header">
        <div class="title">
            TTC LEAVE PASS
        </div>

        <p>
            Official Student Leave Authorization
        </p>
    </div>

    <div class="box">

        <table>

            <tr>
                <td><strong>Student Name</strong></td>
                <td>{{ $leave->user->name }}</td>
            </tr>

            <tr>
                <td><strong>Admission Number</strong></td>
                <td>{{ $leave->user->admission_number }}</td>
            </tr>

            <tr>
                <td><strong>Email</strong></td>
                <td>{{ $leave->user->email }}</td>
            </tr>

            <tr>
                <td><strong>Leave Type</strong></td>
                <td>{{ $leave->leave_type }}</td>
            </tr>

            <tr>
                <td><strong>Departure Date</strong></td>
                <td>{{ $leave->departure_date }}</td>
            </tr>

            <tr>
                <td><strong>Return Date</strong></td>
                <td>{{ $leave->return_date }}</td>
            </tr>

            <tr>
                <td><strong>Status</strong></td>
                <td>{{ strtoupper($leave->status) }}</td>
            </tr>

        </table>

    </div>

    <div class="footer">

        <p>
            Dean Approval Signature:
        </p>

        <br><br>

        __________________________

        <br><br>

        TTC Leave Management System

    </div>

</body>
</html>