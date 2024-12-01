<!DOCTYPE html>
<html lang="en">

<head>
    @include('parts/head')
</head>

<body>
    <!-- ---------------HEADER---------- -->
    <header>
        @include('parts/header')
    </header>

    <!-- ---------------CONTAINER---------- -->

    @yield('content')
    <!-- ---------------HOT PRODUCT---------- -->

    <!-- ---------------FOOTER---------- -->
    @include('parts/footer')
</body>

</html>