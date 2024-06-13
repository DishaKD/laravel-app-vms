<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WMS-Admin</title>

    @include('libraries.styles')
</head>



@include('components.Admin.sidebar')


@yield('content')

@include('components.footer')


@include('libraries.scripts')

</html>
