<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Home Page</title>
    <link rel="stylesheet" href="/css/api_home.css">
</head>

<body>
    <header>
        <nav>
            <div id="logo"></div>
            <ul>

                <li><span class="button_span" id="reveal_token">Reveal Token</span></li>
                <li><?php
                    $session = session();

                    if ($session->get('api-user') == "") {
                        echo '<button id="login-button">Login</button><button  id="register-button">Register</button><input type="hidden" id="login_status" value="0"> ';
                    } else {
                        echo '<button  id="logout-button">Logout</button><input type="hidden" id="login_status" value="1">';
                    }
                    ?></li>
            </ul>
        </nav>
    </header>
    <div class="floating">
        <div>
            <span id="close" class="iconify close-btn" data-icon="ci:close-small"></span>
        </div>
        <span id="token_text"><?php
                                $session = session();

                                if ($session->get('api-user') == "") {
                                    echo 'Please Login or Register to show your token';
                                } else {
                                    print_r($session->get('token'));
                                }
                                ?></span>
    </div>
    <div class="floating-boxes login">
        <p>Login to Your Account</p>
        <span id="error"></span>
        <input placeholder="Username" id="username" type="text">
        <input id="key" placeholder="Key" type="password">
        <button id="login">Login</button>
        <span class="close-boxes" id="close-login-box">Cancel</span>
    </div>
    <div class="floating-boxes register">
        <p>Register for a new Account</p>
        <span id="error"></span>
        <input required placeholder="Username" id="new-username" type="text">
        <input required id="new-key" placeholder="Key" type="password">
        <button id="register">Sign Up</button>
        <span class="close-boxes" id="close-register-box">Cancel</span>
    </div>
    <section id="banner">

    </section>
    <section id="main-text">
        <div class="links">
            <div id="user_list" title="Login needed to use" class="user-disabled">
                <h3>User Endpoints</h3>
                <table>
                    <tr>
                        <td>Fetch All Platform Users
                            <br>
                            Expected Parameters:
                        </td>
                        <td><span title="Copy and Paste in API platform">http://localhost:8080/Api/usersList</span><br>None</td>
                    </tr>
                    <tr>
                        <td>Fetch All Platform Users Filtered by Gender
                            <br>
                            Expected Parameters:
                        </td>
                        <td><span title="Copy and Paste in API platform">http://localhost:8080/Api/usersListGender</span><br>String ('male' or 'female')</td>
                    </tr>
                    <tr>
                        <td>Fetch User Data with on Email
                            <br>
                            Expected Parameters:
                        </td>
                        <td><span title="Copy and Paste in API platform">http://localhost:8080/Api/usersListEmail</span><br>String (Valid Email Address called email)</td>
                    </tr>
                    <tr>
                        <td>Fetch User Data based on Item Purchased
                            <br>
                            Expected Parameters:
                        </td>
                        <td><span title="Copy and Paste in API platform">http://localhost:8080/Api/usersListItemBought</span><br>Item ID (INT)</td>
                    </tr>
                    <tr>
                        <td>Returns a filtered list of users based on age (descending)
                            <br>
                            Expected Parameters:
                        </td>
                        <td><span title="Copy and Paste in API platform">http://localhost:8080/Api/usersListAge</span><br>None</td>
                    </tr>
                    <tr>
                        <td>Fetch All Transactions
                            <br>
                            Expected Parameters:
                        </td>
                        <td><span title="Copy and Paste in API platform">http://localhost:8080/Api/transactionList</span><br>None</td>
                    </tr>
                    <tr>
                        <td>Fetch All Transactions by Item Category
                            <br>
                            Expected Parameters:
                        </td>
                        <td><span title="Copy and Paste in API platform">http://localhost:8080/Api/usersList</span><br>Category ID (INT)</td>
                    </tr>
                </table>
            </div>
            <div>
                <h3>Products Endpoints</h3>
                <table>
                    <tr>
                        <td>Fetch Complete Product Catalog
                            <br>
                            Expected Parameters:
                        </td>
                        <td><span title="Copy and Paste in API platform">http://localhost:8080/Api/productList</span><br>None</td>
                    </tr>
                    <tr>
                        <td>
                            Fetch Product info based on adder <br> Expcted Parameters:
                        </td>
                        <td><span title="Copy and Paste in API platform">http://localhost:8080/Api/productListID</span><br>Adder Id(INT): eg: 3 <br> Token</td>
                    </tr>
                    <tr>
                        <td>
                            Fetch Product info by product id <br> Expcted Parameters:
                        </td>
                        <td><span title="Copy and Paste in API platform">http://localhost:8080/Api/ productListCAT</span><br>Product Id(INT): eg: 1</td>
                    </tr>
                </table>
            </div>
        </div>

    </section>
    <input id="api-user" value="<?php $session = session();
                                echo ($session->get('api-user')); ?>" type="hidden">

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
<script src="/Javascript/index.js"></script>
<script>
    $(document).ready(function() {
        $('#login').click(function() {
            var creds = {
                'username': $('#username').val(),
                'key': $('#key').val()
            }
            if (creds.username == "" || creds.key == "") {
                $('#error').html('Fields cannot be empty')
                $('#error').css('display', 'flex')

            }

            $.ajax({
                method: "post",
                url: "<?php echo base_url('Auth/APILogin') ?>",
                data: creds,
                success: function(response) {
                    if (response == 1) {
                        window.location.reload()
                    } else {
                        if (response == 2 || response == 3) {
                            $('#error').html('')
                            $('#error').html('Username and Key combination is wrong')
                            $('#error').css('display', 'flex');
                            setTimeout(function() {
                                $('#error').css('display', 'none')
                            }, 3000)


                        }

                    }
                }
            });
        })
        $('#logout-button').click(function() {

            $.ajax({
                url: "<?php echo base_url('Auth/logout') ?>",
                method: 'post',
                success: function(response) {
                    window.location.reload();
                }
            })
        })
        $('#register').click(function() {
            var details = {
                'username': $('#new-username').val(),
                'key': $('#new-key').val(),

            }
            if (details.username == "" || details.key == "") {
                $('#error').html('No fields can be left empty')
                $('#error').css('display', 'flex')

            }

            $.ajax({
                url: "<?php echo base_url('Auth/apiReg') ?>",
                method: 'post',
                data: details,
                success: function(result) {
                    if (result == 1) {
                        $('.login').css('display', 'flex')
                        $('.register').css('display', 'none')
                    }

                }
            })
        })
    })
</script>

</html>