<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="/css/profile.css">
    <link rel="stylesheet" href="/css/homepage.css">
    <link rel="stylesheet" href="/css/checkout.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>

<body>
    <header>

        <nav>
            <div>
                <a href="<?php echo site_url('Home') ?>">Kahiko Collection.</a>
            </div>
            <ul>
                <li><?php
                    $session = session();

                    if ($session->get('name') == "") {
                        echo '<button id="login-button">Login</button><button  id="register-button">Register</button>
                ';
                    } else {
                        echo '<a title="View Your Profile" href="' . site_url('Home/user') . '"  id="profile-button">' . $session->get('name') . '</a><button  id="logout-button">Logout</button>';
                    }
                    ?></li>
            </ul>
        </nav>
    </header>
    <div class="main-container">
        <p id="title">Checkout</p>
        <div class="error-message"> <span>No items to display</span> </div>
        <div id="checkout-content" class="hide">
            <table class="w3-table-all w3-card-4">
                <th>Product Name</th>
                <th>Product Description</th>
                <th>Unit Price</th>
                <tbody id="table-body"></tbody>
            </table>
            <div class="after-table">
                <button class="" id="order">Place Order</button>
                <div>
                    <span><b>Total:</b><span id="total"></span></span>
                    <span><b>Wallet:</b><span id="wallet_balance"></span></span>
                    <span><b>Balance:</b><span id="calc-bal"></span></span>
                </div>

            </div>
            <div class="funds-error hide">
                <p>Please <a href="<?php echo site_url('Home/user') ?>">make a deposit</a> to your Wallet to continue.
                </p>
            </div>
        </div>
    </div>
    <input id="userid" value="<?php $session = session();
                                echo ($session->get('userid')); ?>" type="hidden">
</body>
<script src="https://code.iconify.design/2/2.1.1/iconify.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/Javascript/products.js"></script>
<?php include('Includes/js.php') ?>

</html>