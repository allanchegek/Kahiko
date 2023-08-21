<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Panel | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="/css/Admin/admin-lte.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <span><b>Kahiko Collections</b><br> Admin Panel</span>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>


                <div class="input-group mb-3">
                    <input id="email" type="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">

                    </div>
                </div>
                <div class="input-group mb-3">
                    <input id="password" type="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">

                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button id="login" type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>

                <!-- /.login-card-body -->
            </div>
        </div>
        <!-- /.login-box -->
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="/js/admin.js"></script>
<script>
    $(document).ready(function() {
        $(document).on('click', '#login', function() {
            if ($.trim($('#email').val()).length == 0 || $.trim($('#password').val()).length == 0) {
                alert('Please fill Both Fields')

            } else {
                var data = {
                    'email': $('#email').val(),
                    'password': $('#password').val()
                };
                $.ajax({
                    url: "<?php echo base_url('Admin/checkadminLogin') ?>",
                    method: 'POST',
                    data: data,
                    success: function(result) {
                        if (result == 1) {
                            window.location.replace('<?php echo base_url('Admin') ?>');
                        } else {
                            alert('Email and Password combination is wrong');
                        }
                    }
                })
            }

        });



    });
</script>

</html>