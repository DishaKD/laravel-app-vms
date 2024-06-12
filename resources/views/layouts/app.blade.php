<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WMS</title>

    @include('libraries.styles')
</head>

<body class="h-100 text-center text-white bg-dark">


    @include('components.header')


    @yield('content')

    @include('components.footer')


    @include('libraries.scripts')
</body>

</html>
