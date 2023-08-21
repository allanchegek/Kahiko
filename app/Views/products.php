<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Catalog | Kahiko Clothing.</title>
    <link rel="stylesheet" href="/css/homepage.css">
    <link rel="stylesheet" href="/css/products.css">
</head>

<body>
    <div class="before-header"><span>Feel free to step outside your comfort zone.</span></div>

    <div id="top"></div>
    <header>

        <nav>
            <div>
                <a href="<?php echo site_url('Home') ?>">Kahiko Collection.</a>
            </div>
            <ul>
                <li><span id="cart-open">Cart</span></li>
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
    <section class="preamble">
        <h2>Our Catalog.</h2>
        <p>Introducing our latest products made with our sustainable design ethos in mind.</p>
    </section>
    <div class="cart-sidebar">
        <div id="cart-title">
            <p>YOUR CART</p>
            <span id="close" class="iconify close-btn" data-icon="ci:close-small"></span>

            <hr>
        </div>
        <div id="cart-body">
            <?php

            $session = session();

            if ($session->get('name') == "") {
                echo '<div>
				<p>
					You must be logged in to view your cart :(
				</p>
			</div>';
            }
            ?>

            <div id="cart-message">
                <p id="display-message">
                </p>
            </div>
        </div>
        <div id="cart-footer">
            <div>
                <p>Estimated Total:</p>
                <span id="total">Ksh 0.00</span>
            </div>
            <div><button id='checkout'>Checkout</button></div>
        </div>
    </div>
    <section class="products">

        <div id="filters">
            <ul>
                <li>
                    <span class="hoverable-span" id="male">Male </span>
                </li>
                <li><span class="hoverable-span" id="female">Female</span></li>
                <li><span class="hoverable-span" id="kids">Kids</span></li>
                <li><span class="hoverable-span" id="reset">Reset</span></li>

            </ul>
            <ul>
                <li><span id="item-count"></span></li>
            </ul>
        </div>
        <div class="product-card">
        </div>
    </section>
    <input id="userid" value="<?php $session = session();
                                echo ($session->get('userid')); ?>" type="hidden">

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/Javascript/index.js"></script>
<script src="/Javascript/products.js"></script>
<script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>

<script>
    $(document).ready(function() {
        fetchCart()
        $('#register-button').click(function() {
            window.location.replace('<?php echo base_url('Auth/register') ?>')
        })
        $('#login-button').click(function() {
            window.location.replace('<?php echo base_url('Auth/index') ?>')
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
        var id = $('#userid').val();

        function fetchCart() {
            var total_cost = 0
            var n = 0
            var user_data = {
                'userid': $('#userid').val()
            };
            $.ajax({
                url: "<?php echo base_url('Items/fetchCart') ?>",
                method: 'post',
                data: user_data,
                success: function(result) {
                    $('#cart-body').html('')
                    $.each(result, function(key, value) {
                        $.each(this, function(key, value) {

                            $("#cart-body").append(
                                '<div class="cart-item"><p>' + this.product_description + '</p><div id="cart-data"><p><b>' + this.product_name + '</b></p><p>Ksh &nbsp' + this.unit_price + '.00</p><button class=" remove" data-id=' + this.product_id + ' id="remove-cart" title="Remove item from Cart">Remove</button></div><hr></div>'
                            )
                            total_cost = total_cost + parseInt(this.unit_price, 10)
                        })
                    })
                    $('#total').html('');

                    $('#total').html('Ksh&nbsp' + total_cost + '.00');

                }
            })
        }
        $('#checkout').click(function() {
            window.location.replace('<?php echo site_url('Home/checkout') ?>')
        })
        $('#remove-cart').click(function() {
            var data = {
                'userid': $('#userid').val(),
                'product_id': $(this).data('id')
            };
            console.log(data);
            $.ajax({
                url: "<?php echo base_url('Items/removeItem') ?>",
                method: 'post',
                data: data,
                success: function(result) {
                    if (result) {
                        console.log(result);
                        fetchCart()
                    } else {
                        console.log('error');
                    }

                }
            })
        });

        function fetchAllProducts() {
            var count = 0

            $.ajax({
                url: "<?php echo base_url('Items/fetchAllProducts') ?>",
                method: 'POST',
                success: function(response) {
                    $.each(response.products, function(key, value) {

                        $(".product-card").append(
                            "<div class='card'><img  src='" + value.product_image +
                            "'><div id='details'><p><b>" + value.product_name + "<b></p><span id='product-price'>Kes &nbsp" + value.unit_price + ".00</span><br><span data-id='" + value.product_id + "' id='buy-btn' class='purchase-btn'>Purchase</span></div></div>"
                        )
                        count = count + 1
                    })
                    $('#item-count').html('<b>Product Count:&nbsp;</b>' + count + '&nbsp; Products')
                }
            })
        }
        fetchAllProducts()


        $('#male').click(function(e) {
            modifier = 'male'
            $(".product-card").html('')
            fetchFilteredProducts();

        });
        $('#female').click(function(e) {
            modifier = 'female'
            $(".product-card").html('')
            fetchFilteredProducts();

        });
        $('#kids').click(function(e) {
            modifier = 'kid'
            $(".product-card").html('')
            fetchFilteredProducts();

        });
        $('#reset').click(function(e) {
            $(".product-card").html('')
            fetchAllProducts();

        });

        function fetchFilteredProducts() {
            var count = 0
            var data = {
                'gender': modifier
            }
            $.ajax({
                url: "<?php echo base_url('Items/fetchFilteredProducts') ?>",
                method: 'POST',
                data: data,
                success: function(response) {
                    $.each(response.products, function(key, value) {

                        $(".product-card").append(
                            "<div class='card'><img  src='" + value.product_image +
                            "'><div id='details'><p><b>" + value.product_name + "<b></p><span id='product-price'>Kes &nbsp" + value.unit_price + ".00</span><br><span data-id='" + value.product_id + "' class='purchase-btn'>Purchase</span></div></div>"
                        )
                        count = count + 1
                    })
                    $('#item-count').html('<b>Product Count:&nbsp;</b>' + count + '&nbsp; Products')
                }
            })
        }

        $(document).on('click', '#buy-btn', function() {
            var details = {
                'productid': $(this).data('id'),
                'customer_id': $('#userid').val(),
                'product_name': $(this).parent().parent().find('#product-name').html()
            };
            console.log(details);
            $.ajax({
                url: "<?php echo base_url('Items/addtoCart') ?>",
                method: 'post',
                data: details,
                success: function(result) {
                    if (result == 1) {
                        alert('Product Added to Cart');
                    } else if (result == 'duplicate') {
                        alert('This item has already been added to the cart');
                    } else {
                        console.log(result)
                        alert('an unexpected error has been encountered');
                    }

                }
            })
            fetchCart();
        })

    })
</script>

</html>