```php
<x-guest-layout>

<div style="
min-height:100vh;
display:flex;
justify-content:center;
align-items:center;
flex-direction:column;
padding:30px;
">

    <div style="text-align:center;margin-bottom:30px;">

        <h1 style="
        font-size:55px;
        color:white;
        font-weight:800;
        letter-spacing:2px;
        margin:0;
        ">
            TTC LEAVE-OUT
        </h1>

        <p style="
        color:#60a5fa;
        font-size:20px;
        letter-spacing:6px;
        margin-top:10px;
        ">
            MANAGEMENT SYSTEM
        </p>

    </div>

    <div style="
    width:100%;
    max-width:1000px;
    display:flex;
    border-radius:25px;
    overflow:hidden;
    backdrop-filter:blur(20px);
    background:rgba(255,255,255,.05);
    border:1px solid rgba(255,255,255,.15);
    box-shadow:0 20px 50px rgba(0,0,0,.4);
    ">

        <!-- LEFT PANEL -->

        <div style="
        flex:1;
        background:linear-gradient(
        135deg,
        rgba(59,130,246,.7),
        rgba(37,99,235,.4)
        );
        padding:60px 40px;
        color:white;
        display:flex;
        flex-direction:column;
        justify-content:center;
        text-align:center;
        ">

            <div style="font-size:80px;">
                🎓
            </div>

            <h2 style="
            font-size:42px;
            font-weight:bold;
            margin-top:20px;
            ">
                Welcome Back
            </h2>

            <p style="
            margin-top:20px;
            font-size:18px;
            line-height:1.8;
            ">
                Sign in to access your dashboard and manage leave requests efficiently.
            </p>

            <hr style="
            margin:35px 0;
            border-color:rgba(255,255,255,.2);
            ">

            <p>
                Secure • Reliable • Efficient
            </p>

        </div>

        <!-- RIGHT PANEL -->

        <div style="
        flex:1.2;
        padding:60px;
        ">

            <x-auth-session-status
                class="mb-4"
                :status="session('status')"
            />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <label style="color:white;">
                        Email Address
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        style="
                        width:100%;
                        margin-top:10px;
                        padding:15px;
                        border-radius:10px;
                        border:1px solid #3b82f6;
                        background:rgba(255,255,255,.05);
                        color:white;
                        "
                    >

                    <x-input-error
                        :messages="$errors->get('email')"
                        class="mt-2"
                    />
                </div>

                <div style="margin-top:25px;">

                    <label style="color:white;">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        required
                        style="
                        width:100%;
                        margin-top:10px;
                        padding:15px;
                        border-radius:10px;
                        border:1px solid #3b82f6;
                        background:rgba(255,255,255,.05);
                        color:white;
                        "
                    >

                    <x-input-error
                        :messages="$errors->get('password')"
                        class="mt-2"
                    />
                </div>

                <div style="
                display:flex;
                justify-content:space-between;
                align-items:center;
                margin-top:25px;
                color:white;
                ">

                    <label>
                        <input type="checkbox" name="remember">
                        Remember Me
                    </label>

                    @if (Route::has('password.request'))
                        <a
                        href="{{ route('password.request') }}"
                        style="color:#60a5fa;"
                        >
                            Forgot Password?
                        </a>
                    @endif

                </div>

                <button
                    type="submit"
                    style="
                    width:100%;
                    margin-top:30px;
                    padding:15px;
                    border:none;
                    border-radius:10px;
                    background:#2563eb;
                    color:white;
                    font-size:18px;
                    font-weight:bold;
                    cursor:pointer;
                    "
                >
                    LOG IN
                </button>

                <div style="
                text-align:center;
                margin-top:30px;
                color:white;
                ">
                    New here?

                    <a
                    href="{{ route('register') }}"
                    style="
                    color:#60a5fa;
                    font-weight:bold;
                    "
                    >
                        Register as Student
                    </a>
                </div>

            </form>

        </div>

    </div>

    <div style="
    color:#cbd5e1;
    margin-top:25px;
    text-align:center;
    ">
        © 2026 TTC Leave-Out Management System
    </div>

</div>

</x-guest-layout>
```
