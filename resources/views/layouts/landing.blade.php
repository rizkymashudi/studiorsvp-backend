<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @stack('prepend-style')
    @include('includes.client.style')
    @stack('addon-style')
    
    <title>Studio rental</title>
</head>

<body>
    <!-- Navbar -->
    @include('includes.client.navbar')

    <!-- Content -->
    @yield('content')

    <!-- Footer -->
    @include('includes.client.footer')

    @stack('prepend-script')
    @include('includes.client.script')
    @stack('addon-script')
</body>

</html>