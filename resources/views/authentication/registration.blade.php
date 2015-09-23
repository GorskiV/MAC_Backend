<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Feedly</title>

    <!-- Bootstrap core CSS -->

    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <link href="../fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="../css/custom.css" rel="stylesheet">
    <link href="../css/icheck/flat/green.css" rel="stylesheet">


    <script src="js/jquery.min.js"></script>

    <!--[if lt IE 9]>
    <script src="../assets/js/ie8-responsive-file-warning.js"></script>
    <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style="background:#F7F7F7;">

<div class="">

    <div id="wrapper">
        <div id="login" class="animate form">
            <section class="login_content">
                <div class="text-center">
                    <img src="../images/logo_300.png" width="150px" alt="">
                    <h1 class="logo-text">Feddly</h1>
                    <div class="colorgraph">
                        <br>
                </div>
                <form>
                    <h1>Register</h1>
                </form>
                {!! Form::model([
                        'method' => 'post',
                        'url' => ['auth/register'],
                        'class' => 'form-horizontal',
                        'id' => 'user-registration-form'
                ]) !!}
                <div>
                    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder'=>'Email']) !!}
                </div>
                <div>
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder'=>'Password']) !!}
                </div>
                <div>
                    {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder'=>'Repeat password']) !!}
                </div>
                <div>
                    {!! Form::submit('Register', ['class' => 'btn btn-sucess col-xs-12']) !!}
                </div>
                <div class="clearfix"></div>
                <div class="separator">
                    <p class="change_link">Already a member ?
                        <a href="{{ URL::to('auth/login') }}" class=""> Log in </a>
                    </p>
                </div>

                {!! Form::close() !!}
                        <!-- form -->

                @include('errors.errors')
            </section>
            <!-- content -->
        </div>
    </div>
</div>

</body>

</html>