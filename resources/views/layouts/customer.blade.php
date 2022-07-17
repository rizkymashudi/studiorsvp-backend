<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    @stack('prepend-style')
    @include('includes.client.style')
    @stack('addon-style')

    <title>Music studio rental</title>
</head>

<body>
    
    <div class="wrapper">
        @include('sweetalert::alert')
        @include('includes.client.navbar')
        @include('includes.client.sidebar')

        <!-- Content -->
        <div class="content overview overflow-auto">
            @yield('content')
        </div>

    </div>

    
    @stack('prepend-script')
    @include('includes.client.script')
    @stack('addon-script')
</body>

</html>