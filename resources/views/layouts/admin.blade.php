<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WMS-Admin</title>

    @include('libraries.styles')
</head>

@include('components.Admin.sidebar')


<div class="main-content">
    @include('components.Admin.topNavBar')
    @yield('content')
</div>



@include('libraries.scripts')
@include('libraries.adminScript')

</html>
