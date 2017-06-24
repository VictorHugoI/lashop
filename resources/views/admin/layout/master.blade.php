<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Dashboard</title>
    {{ Html::style('assets/css/admin.min.css') }}
    @yield('css')
    @stack('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    @include('admin.layout.section.nav_master')
    <div id="page-wrapper" class="gray-bg dashbard-1">
        @include('admin.layout.section.header_master')
        @yield('content')
    </div>
    {{--@include('admin.layout.section.right_sidebar_master')--}}

    {{ Html::script('assets/js/admin.min.js') }}

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
