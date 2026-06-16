<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TTC Leave Management System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style="margin:0;font-family:Arial, sans-serif;background:#f4f6f9;">

    <div style="background:#1e3a8a;color:white;padding:20px;text-align:center;">
        <h1 style="margin:0;">
            TTC Leave Management System
        </h1>

        <p style="margin-top:10px;">
            Student Leave Processing & Security Monitoring Platform
        </p>
    </div>

    <div style="text-align:center;padding:80px 20px;">

        <h2 style="font-size:40px;color:#1f2937;">
            Welcome to the Leave Management System
        </h2>

        <p style="font-size:18px;color:#6b7280;max-width:700px;margin:auto;">
            Submit leave requests online, receive approvals from the Dean,
            and track student movements securely through the institution's
            security department.
        </p>

        <div style="margin-top:40px;">

            <a href="/login"
               style="background:#2563eb;color:white;padding:15px 30px;text-decoration:none;border-radius:8px;font-size:18px;">
                Login
            </a>

            <a href="/register"
               style="background:#10b981;color:white;padding:15px 30px;text-decoration:none;border-radius:8px;font-size:18px;margin-left:15px;">
                Register
            </a>

        </div>

    </div>

    <div style="max-width:1100px;margin:auto;padding:20px;">

        <div style="display:flex;gap:20px;flex-wrap:wrap;justify-content:center;">

            <div style="background:white;padding:25px;border-radius:10px;width:300px;box-shadow:0 2px 10px rgba(0,0,0,0.1);">
                <h3>Students</h3>
                <p>
                    Apply for leave, track approvals,
                    and view leave history.
                </p>
            </div>

            <div style="background:white;padding:25px;border-radius:10px;width:300px;box-shadow:0 2px 10px rgba(0,0,0,0.1);">
                <h3>Dean's Office</h3>
                <p>
                    Review leave requests and
                    approve or reject applications.
                </p>
            </div>

            <div style="background:white;padding:25px;border-radius:10px;width:300px;box-shadow:0 2px 10px rgba(0,0,0,0.1);">
                <h3>Security Department</h3>
                <p>
                    Monitor exits and returns
                    of approved students.
                </p>
            </div>

        </div>

    </div>

    <div style="background:#111827;color:white;text-align:center;padding:20px;margin-top:60px;">
        © {{ date('Y') }} TTC Leave Management System
    </div>

</body>
</html>