<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Homepage</title>
	<link rel="stylesheet" href="/css/homepage.css">
</head>

<body>
	<div id="top"></div>
	<div class="before-header"><span>Welcome To Kahiko Collections.</span></div>
	<header>

		<nav>
			<div>
				<a href="#top">Kahiko Collections.</a>
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
	<div class="overall-wrapper">
		<section class="main">
			<div class="images-container">
				<div class="left-image">
				</div>
				<div class="right-image">
				</div>
			</div>
			<div class="text-buttons">
				<h2>Explore More</h2>
				<p>Introducing Kahiko Collections</p>
				<div><span class="product-link span-btn">Shop Men</span>
					<span class="product-link span-btn">Shop Women</span>
				</div>

			</div>

		</section>
		<section class="below">
			<div class="content-container">
				<div id="image"></div>
				<div id="text">
					<p>‘One of the main advantages we have growing cotton in a protective environment is that, when it comes to sustainability, we have a lot more control than a traditional farmer.’</p>
					<span>~Our CEO on Cotton Farming</span>
				</div>
			</div>
		</section>
		<section class="footer">

			<footer>
				<div>
					<ul>
						<li><a href="">Contact Us</a></li>
						<li><a href="">Store Locator</a></li>
						<li><a href="">Payment Info</a></li>
						<li><a href="">Privacy Notice</a></li>
						<li><a href="">Cookie Settings</a></li>
					</ul>
				</div>
				<div>
					<ul>
						<li><a href="">Student Discount</a></li>
						<li><a href="">About Kahiko Collections</a></li>
						<li><a href="">Facebook</a></li>
						<li><a href="">Pintrest</a></li>
						<li><a href="">Instagram</a></li>
					</ul>
				</div>
				<div>
					<span id="subscribe">Subscribe</span>
				</div>
			</footer>
			<div class="logo">
				<span>Kahiko Collections.</span>
			</div>
		</section>

		<input id="userid" value="<?php $session = session();
									echo ($session->get('userid')); ?>" type="hidden">
	</div>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="/Javascript/index.js"></script>

	<script>
		$(document).ready(function() {
			fetchCart()
			$('#register-button').click(function() {
				window.location.replace('<?php echo base_url('Auth/register') ?>')
			})
			$('.product-link').click(function() {
				window.location.replace('<?php echo base_url('Home/products') ?>')
			})

			$('#checkout').click(function() {
				window.location.replace('<?php echo base_url('Home/checkout') ?>')
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
						$.each(result, function(key, value) {
							$.each(this, function(key, value) {
								$("#cart-body").append(
									'<div class="cart-item"><div id="cart-image-container"><img id="cart-image" src="' + this.product_image + '"></div><div id="cart-data"><p><b>' + this.product_name + '</b></p><p>Ksh &nbsp' + this.unit_price + '.00</p><button class=" remove" data-id=' + this.product_id + ' id="remove-cart" title="Remove item from Cart">Remove</button></div><hr></div>'
								)
								total_cost = total_cost + parseInt(this.unit_price, 10)
							})
						})
						$('#total').html('');

						$('#total').html('Ksh&nbsp' + total_cost.toLocaleString('en') + '.00');

					}
				})
			}

			function removeItem(product_id) {
				var data = {
					'userid': $('#userid').val(),
					'product_id': product_id
				};
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
			}

		})
	</script>
	<script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
</body>

</html>