<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Login</title>

    {{ Html::style('assets/css/admin.min.css') }}

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">IN+</h1>

            </div>
            <h3>Welcome to IN+</h3>
            <p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
                <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
            </p>
            <p>Login in. To see it in action.</p>
            {{-- <form class="m-t" method="POSt" role="form" action="{{ route('admin.login') }}"> --}}
            {{ Form::open(['route' => 'admin.login'], ['class' => 'm-t']) }}
                <div class="form-group">
                    {{-- <input name="email" type="email" class="form-control" placeholder="Username" required=""> --}}
                    {{ Form::text('email', null, [
                        'id' => 'name',
                        'class' => 'form-control',
                        'placeholder' => 'Username',
                    ]) }}
                </div>
                <div class="form-group">
                    {{-- <input name="password" type="password" class="form-control" placeholder="Password" required=""> --}}
                    {{ Form::password('password', [
                        'id' => 'password',
                        'class' => 'form-control',
                        'placeholder' => 'Password',
                        'type' => 'password', 
                    ]) }}
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                <a href="#"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a>
            {{-- </form> --}}
            {{ Form::close() }}
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    {{ Html::script('assets/js/admin.min.js') }}

</body>

</html>
