<script>
    getWalletbalance()
    getUser()
    populatePurchases()
    populateUser()
    populateWallet()
    fetchCheckoutCart()




    function getWalletbalance() {
        $.ajax({
            url: "<?php echo base_url('User/getWalletbalance') ?>",
            method: 'POST',
            data: {
                userid: $("#userid").val()
            },
            success: function(response) {
                if (response == null) {
                    $('#balance').html('Ksh 00.00')
                } else {
                    $('#balance').html("")
                    $('#balance').html(" <b>Store Credit Balance:&nbsp;&nbsp;</b>Ksh&nbsp;&nbsp;" + response.amount_available + ".00")

                }

            }
        })
    }
    var wallet_balance = 0

    function populateWallet() {
        $.ajax({
            url: "<?php echo base_url('User/getWalletbalance') ?>",
            method: 'POST',
            data: {
                userid: $("#userid").val()
            },
            success: function(response) {
                if (response == null) {
                    $('#wallet_balance').html('Ksh 00.00')
                } else {
                    wallet_balance = response.amount_available
                    $('#wallet_balance').html(response.amount_available)

                }

            }
        })
    }
    $('#deposit').click(function() {
        updateWalletbalance()
    });

    function updateWalletbalance() {
        data = {
            userid: $("#userid").val(),
            amount_available: parseInt($('#wallet_balance').html()) + parseInt($('#deposit_amount').val()),
        };
        $.ajax({
            method: 'post',
            url: "<?php echo base_url('User/updateWalletbalance') ?>",
            data: data,
            success: function(response) {
                populateWallet()
            }
        })

    }

    function clearCart() {
        data = {
            user_id: $("#userid").val()
        };
        $.ajax({
            method: 'post',
            url: "<?php echo base_url('ProductHandler/clearCart') ?>",
            data: data,
            success: function(response) {
                // console.log(response);
            }

        })
    }

    function getUser() {
        data = {
            user_id: $("#userid").val()
        };
        $.ajax({
            method: 'post',
            url: "<?php echo base_url('User/getUser') ?>",
            data: data,
            success: function(response) {
                $.each(response.records, function(key, value) {
                    $('#account-holder').append('<b>Account Holder:&nbsp;&nbsp;</b>' + value.first_name + '&nbsp;' + value.last_name)
                })

            }

        })

    }

    function populateUser() {
        data = {
            user_id: $("#userid").val()
        };
        $.ajax({
            method: 'post',
            url: "<?php echo base_url('User/getUser') ?>",
            data: data,
            success: function(response) {
                $.each(response.records, function(key, value) {
                    $('#names').append(value.first_name + '&nbsp;' + value.last_name)
                    $('#email').append(value.email)
                    $('#gender').append(value.gender)


                })
            }

        })

    }

    function populatePurchases() {

        var details = {
            'customer_id': $('#userid').val()
        };
        $.ajax({
            url: "<?php echo base_url('Items/history') ?>",
            method: 'post',
            data: details,
            success: function(response) {
                if (response.purchases.length != 0) {
                    $('.message').addClass('hide');
                    $('.table').removeClass('hide');

                    $.each(response.purchases, function(key, value) {
                        $("#purchases-table-body").append(
                            '<tr><td>' + value.purchase_id + '</td><td>' + value.product_name + '</td><td>' + value.unit_price + '</td><td>' + value.date_created + '</tr>'
                        )
                    })
                } else {
                    $('.message').removeClass('hide');
                    $('.table').addClass('hide');
                }
            }
        })
    }

    function fetchCheckoutCart() {
        var total_cost = 0
        var user_data = {
            'userid': $('#userid').val()
        };
        $.ajax({
            url: "<?php echo base_url('Items/fetchCart') ?>",
            method: 'post',
            data: user_data,
            success: function(result) {
                if (result.length = !0) {
                    $('#checkout-content').removeClass('hide')
                    $('.error-message').addClass('hide')
                }
                $('#table-body').html('')
                $.each(result, function(key, value) {
                    $.each(this, function(key, value) {

                        $("#table-body").append(
                            '<tr><td>' + this.product_name + '</td><td>' + this.product_description + '</td><td>' + this.unit_price + '</td></tr>'
                        )
                        total_cost = total_cost + parseInt(this.unit_price, 10)
                    })
                })
                $('#total').html('');

                $('#total').html('Ksh&nbsp' + total_cost + '.00');
                $('#calc-bal').html('Ksh&nbsp' + (wallet_balance - total_cost) + '.00');

                if ((wallet_balance - total_cost) < 0) {
                    $('#order').addClass('disabled-hover')
                    $('.funds-error').removeClass('hide')

                } else {
                    $('#order').removeClass('disabled-hover')
                }

            }
        })

        $('#order').click(function() {
            if ((wallet_balance - total_cost) < 0) {
                window.location.replace('<?php echo site_url('Home/user') ?>')

            } else {
                var user_data = {
                    'userid': $('#userid').val()
                }
                var purchase = []
                $.ajax({
                    url: "<?php echo base_url('Items/fetchCart') ?>",
                    method: 'post',
                    data: user_data,
                    success: function(result) {
                        $.each(result, function(key, value) {
                            $.each(this, function(key, value) {
                                purchase.push({
                                    userid: $('#userid').val(),
                                    product_name: this.product_name,
                                    unit_price: this.unit_price
                                })

                            })
                            recordPurchase(purchase)

                        })
                    }

                })
            }

        })

        function recordPurchase(purchase) {
            $.each(purchase, function(key, value) {
                $.ajax({
                    url: "<?php echo base_url('Items/purchase') ?>",
                    method: 'post',
                    data: this,
                    success: function(response) {
                        alert('Item(s) Purchased Successfully')
                        setTimeout(function() {
                            window.location.reload()
                        }, 3000)
                    }
                })
            })

        }
    }
</script>