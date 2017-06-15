<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from htmldemo.magikcommerce.com/ecommerce/inspire-html-template/digital/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Aug 2015 08:00:59 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Wine Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    @include('user.layouts.section.appStyle')
    @yield('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body class="cms-index-index">
<div id="app">
<div class="page">
    @include('user.layouts.section.app_Header')
    @include('user.layouts.section.app_Nav')

    @yield('content')

    @include('user.layouts.section.app_Footer')
</div>
</div>
    @include(('user.layouts.section.app_QuickView'))
    @include('user.layouts.section.appScript')
@yield('javascript')
</body>
</html>
