<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/css/login.css">
</head>

<body>
    <div class="container">
        <div class="login-wrapper">
            <div class="left"></div>
            <div class="right">
                <p>Kahiko Collection.</p>
                <p>Login to your Account</p>
                <span class="message">Email and Password combination is wrong</span>
                <label for="email">Email:</label>
                <input id="email" type="email" ">
                <label for=" password">Password</label>
                <input id="password" type="password">
                <button id="login">Login</button>
                <a href="<?php echo site_url('Auth/register') ?>">Create an Account</a>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#login').click(function() {
                var creds = {
                    'email': $('#email').val(),
                    'password': $('#password').val()
                }
                if (creds.email == "" || creds.password == "") {
                    $('.message').html('Fields cannot be empty')
                    $('.message').css('display', 'flex')

                }

                $.ajax({
                    method: "post",
                    url: "<?php echo base_url('Auth/login') ?>",
                    data: creds,
                    success: function(response) {
                        if (response == 1) {
                            window.location.replace('<?php echo base_url('Home') ?>')
                        } else {
                            if (response == 2 || response == 3) {
                                $('.message').html('')
                                $('.message').html('Password and Email combination is wrong')
                                $('.message').css('display', 'flex');
                                setTimeout(function() {
                                    $('.message').css('display', 'none')
                                }, 3000)


                            }

                        }
                    }
                });
            })
        })
    </script>
</body>


</html>