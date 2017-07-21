<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="base-url" content="{{ url('/') }}">
        @yield('title')
        <!-- Favicons Icon -->
        {!! Html::favicon('http://demo.magikthemes.com/skin/frontend/base/default/favicon.ico') !!}
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        {!! Html::style('assets/css/customer.min.css') !!}
        {{-- {!! Html::style('css/font-awesome.css') !!} --}}
        <!-- Google Fonts -->
        {!! Html::style('https://fonts.googleapis.com/css?family=Roboto:400,500,700') !!}
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700' rel='stylesheet' type='text/css'>
        {!! Html::script('assets/plugins/sweetalert/sweetalert.min.js') !!}
        {!! Html::style('assets/plugins/sweetalert/sweetalert.css') !!}
        {!! Html::script('assets/js/jquery.min.js') !!}
    {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery.pjax/2.0.1/jquery.pjax.js') !!}
        @yield('css')
        @stack('styles')
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="PUSHER-APP-KEY" content="{{ env('PUSHER_APP_KEY') }}">
        <script>
            window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
            ]); ?>
        </script>
</head>
<body id="body">
<div style="background-color: rgb(119, 119, 119); opacity: 0.7; cursor: pointer; height: 100%; display: none; padding: 0; position: fixed;" id="fancybox-overlay"></div>
<div style="width: 1190px; height: auto; top: 20%; left: 25%; display: none; position: fixed;" id="fancybox-wrap">
    <div id="fancybox-outer">
        <div style="border-width: 10px; width: 1170px; height: auto;" id="fancybox-content">

        </div>
        <a style="display: inline;" id="fancybox-close"></a> </div>
</div>
    @include('customers.layout.sections.header')
    @include('customers.layout.sections.navbar')
    @yield('content')
    @yield('related')
    @include('customers.layout.sections.footer')
    @include('customers.layout.sections.social')
    {!! Html::script('assets/js/customer.min.js') !!}
    <script type='text/javascript'>
        jQuery(document).ready(function(){
        jQuery('#rev_slider_4').show().revolution({
        dottedOverlay: 'none',
        delay: 5000,
        startwidth: 1170,
        startheight: 580,

        hideThumbs: 200,
        thumbWidth: 200,
        thumbHeight: 50,
        thumbAmount: 2,

        navigationType: 'thumb',
        navigationArrows: 'solo',
        navigationStyle: 'round',

        touchenabled: 'on',
        onHoverStop: 'on',

        swipe_velocity: 0.7,
        swipe_min_touches: 1,
        swipe_max_touches: 1,
        drag_block_vertical: false,

        spinner: 'spinner0',
        keyboardNavigation: 'off',

        navigationHAlign: 'center',
        navigationVAlign: 'bottom',
        navigationHOffset: 0,
        navigationVOffset: 20,

        soloArrowLeftHalign: 'left',
        soloArrowLeftValign: 'center',
        soloArrowLeftHOffset: 20,
        soloArrowLeftVOffset: 0,

        soloArrowRightHalign: 'right',
        soloArrowRightValign: 'center',
        soloArrowRightHOffset: 20,
        soloArrowRightVOffset: 0,

        shadow: 0,
        fullWidth: 'on',
        fullScreen: 'off',

        stopLoop: 'off',
        stopAfterLoops: -1,
        stopAtSlide: -1,

        shuffle: 'off',

        autoHeight: 'off',
        forceFullWidth: 'on',
        fullScreenAlignForce: 'off',
        minFullScreenHeight: 0,
        hideNavDelayOnMobile: 1500,

        hideThumbsOnMobile: 'off',
        hideBulletsOnMobile: 'off',
        hideArrowsOnMobile: 'off',
        hideThumbsUnderResolution: 0,

        hideSliderAtLimit: 0,
        hideCaptionAtLimit: 0,
        hideAllCaptionAtLilmit: 0,
        startWithSlide: 0,
        fullScreenOffsetContainer: ''
        });
        });
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    
    {!! Html::script('assets/js/app.js') !!}
    @stack('scripts')

</body>
</html>
