<?php

$session = session();
if ($session->get('admin') != "") {

    header('location:' . site_url('Admin/admin'));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/Admin/admin.css">
</head>

<body>
    <div class="login">
        <div id="login-image"></div>
        <div id="login-card">
            <h1>Admin Login</h1>
            <input placeholder="Email" id="email" type="email"><br><br>
            <input placeholder="Password" id="password" type="password" type="password"><br><br>
            <button id="login-btn">Log In</button>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
            $('#login-btn').click(function() {
                    var creds = {
                        'email': $('#email').val(),
                        'password': $('#password').val()
                    }

                    if (creds.email == "" || creds.password == "") {
                        alert('No fieldsare to be left empty')
                    }

                    $.ajax({

                            method: "post",
                            url: "<?php echo base_url('Auth/Adminlogin') ?>",
                            data: creds,
                            success: function(response) {
                                if (response == 1) {
                                    window.location.replace('<?php echo base_url('Admin/admin') ?>')
                                } else {
                                    if (response == 2 || response == 3) {
                                        alert('Password and Email combination is wrong')
                                    }

                                }
                            }
                        }

                    );
                }

            )
        }

    )
</script>

</html>