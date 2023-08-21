<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="/css/login.css">
</head>

<body>
    <div class="container">
        <div class="register-wrapper">
            <div class="left-registration"></div>
            <div class="right">
                <p>Kahiko Collection</p>
                <p>Register</p>
                <span class="message">No field can be left blank :)</span>
                <label for="firstname">First Name:</label>
                <input id="firstname" type="text" ">
                <label for=" lasttname">Last Name:</label>
                <input id="lastname" type="text" ">
                <label for=" email">Email:</label>
                <input id="email" type="email" ">
                <label for=" password">Password</label>
                <input id="password" type="password">
                <label for="gender">Gender</label>
                <select id="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                <button id="register">Register</button>
                <a href="<?php echo site_url('Auth') ?>">Back</a>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#register').click(function() {
                var details = {
                    'firstname': $('#firstname').val(),
                    'lastname': $('#lastname').val(),
                    'email': $('#email').val(),
                    'password': $('#password').val(),
                    'gender': $('#gender').val()
                }
                if (details.email == "" || details.password == "" || details.gender == "" || details.firstname == "" || details.lastname == "") {
                    $('.message').html('No fields can be left empty')
                    $('.message').css('display', 'flex')

                }

                $.ajax({
                    url: "<?php echo base_url('Auth/processRegistration') ?>",
                    method: 'post',
                    data: details,
                    success: function(result) {
                        if (result == 1) {
                            window.location.replace('<?php echo base_url('Auth') ?>')
                        } else {
                            $('.message').html('There has been an unknown Error')
                            $('.message').css('display', 'flex')

                        }

                    }
                })
            })
        })
    </script>
</body>


</html>