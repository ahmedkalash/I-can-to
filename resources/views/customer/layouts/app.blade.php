<!DOCTYPE html>
<html lang="{{app()->getLocale()}}" dir="{{Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocaleDirection()}}">

<head>
    @include('customer.layouts.includes.head')
    @yield('head')
</head>
<body>
    @yield('content')

    @include('sweetalert::alert')
</body>
</html>
