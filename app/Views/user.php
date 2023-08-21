<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Info</title>
    <link rel="stylesheet" href="/css/profile.css">
    <link rel="stylesheet" href="/css/homepage.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>

    <div id="top"></div>
    <div class="before-header"><span>Dare to Dream.</span></div>
    <header>

        <nav>
            <div>
                <a href="<?php echo site_url('Home') ?>">Kahiko Collection.</a>
            </div>
            <ul>
                <li><a href="<?php echo site_url('Home/products') ?>">Women</a></li>
                <li><a href="<?php echo site_url('Home/products') ?>">Men</a></li>
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
    <div class="container">
        <div class="sidebar">
            <div class="tab-options">
                <ul>
                    <li><span id="overview">Account Overview</span></li>
                    <li><span id="history">History</span></li>
                    <li><span id="info">Personal Information</span></li>
                    <li><span id="wallet">Wallet</span></li>

                </ul>
            </div>
        </div>
        <div class="main-content">
            <div class="content-tab overview" id="overview-content">
                <h1>Account Overview</h1>
                <div class="details-card">
                    <h4>Account Info</h4>
                    <div>
                        <p id="account-holder"></p>
                    </div>


                </div>
                <div class="details-card">
                    <h4>Wallet Balance</h4>
                    <div>
                        <p id="balance">
                        </p>

                    </div>
                </div>
            </div>
            <div class="content-tab history hide" id="history-content">
                <div class="message">
                    <h1>You have no Past Purchases with us.😢</h1>
                </div>
                <table class=" hide table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Purchase ID</th>
                            <th>Item Name</th>
                            <th>Price</th>
                            <th>Date Bought</th>
                        </tr>
                    </thead>
                    <tbody id="purchases-table-body"></tbody>
                </table>
            </div>
            <div class="content-tab info hide" id="info-content">
                <div id="user_img">
                    <img src="/images/user.svg">
                </div>
                <div id="user_content">
                    <span id="names"><b>Name:&nbsp;&nbsp;</b></span>
                    <span id="email"><b>Email:&nbsp;&nbsp;</b></span>
                    <span id="gender"><b>Gender:&nbsp;&nbsp;</b></span>
                </div>
            </div>
            <div class="content-tab wallet hide" id="wallet-content">
                <h3>Wallet and Deposit</h3>
                <span><b>Wallet Balance:&nbsp;&nbsp;Ksh&nbsp;
                        <span id="wallet_balance"></span>.00</b></span>
                <h5>Make a Deposit</h5>
                <label for="">Card Number:</label>
                <input type="text">
                <label for="">Amount:</label>
                <input id="deposit_amount" type="number"><br>
                <button id="deposit">Deposit</button>
            </div>
        </div>

    </div>



    <input id="userid" value="<?php $session = session();
                                echo ($session->get('userid')); ?>" type="hidden">
</body>
<script src="https://code.iconify.design/2/2.1.1/iconify.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/Javascript/products.js"></script>
<script src="/Javascript/index.js"></script>
<?php include('Includes/js.php') ?>;

</html>