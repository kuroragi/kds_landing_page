<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kuroragi Digital Studio</title>
    @include('layouts.partials._head')
</head>

<body>

    <!-- Header -->
    @include('layouts.partials._header')

    @yield('content')

    @include('layouts.partials._foot')
</body>

</html>