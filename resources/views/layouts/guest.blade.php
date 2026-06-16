```php
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>TTC Leave-Out Management System</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body style="
margin:0;
min-height:100vh;
font-family:Figtree,sans-serif;
background:
linear-gradient(rgba(0,10,40,.85),rgba(0,10,40,.85)),
url('https://images.unsplash.com/photo-1523050854058-8df90110c9f0');
background-size:cover;
background-position:center;
background-attachment:fixed;
">

{{ $slot }}

</body>
</html>
```
