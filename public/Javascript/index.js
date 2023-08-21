$(document).ready(function() {
    $('#close').click(function() {
        $('.cart-sidebar').css('display', 'none')
    })
    $('#close-login-box').click(function() {
        $('.login').css('display', 'none')
    })
    $('#close-register-box').click(function() {
        $('.register').css('display', 'none')
    })
    $('#close').click(function() {
        $('.floating').css('display', 'none')

    })
    $('#cart-open').click(function() {
        $('.cart-sidebar').css('display', 'flex')
    })
    $('#reveal_token').click(function() {
        $('.floating').css('display', 'flex')
    })
    
    $('#login-button').click(function() {
        $('.login').css('display', 'flex')
    })
    $('#register-button').click(function() {
        $('.register').css('display', 'flex')
    })
    $('#remove-cart').click(function() {
        console.log('hey');
    })
    $('#categories-hoverable').click(function() {
        $('.categories').css('display', 'flex')
    })
    if($('#login_status').val()==1){
        $('#user_list').removeClass('user-disabled');
    }
    $('#overview').click(function() {
        $('#overview').addClass('active-tab')
        $('#history').removeClass('active-tab')
        $('#info').removeClass('active-tab')
        $('#wallet').removeClass('active-tab')

        $('.overview').removeClass('hide')
        $('.history').addClass('hide')
        $('.info').addClass('hide').removeClass('grid')
        $('.wallet').addClass('hide')
    })
    $('#history').click(function() {
        $('#history').addClass('active-tab')
        $('#overview').removeClass('active-tab')
        $('#info').removeClass('active-tab')
        $('#wallet').removeClass('active-tab')

        $('.history').removeClass('hide')
        $('.overview').addClass('hide')
        $('.info').addClass('hide').removeClass('grid')
        $('.wallet').addClass('hide')

    })
    $('#info').click(function() {
        $('#info').addClass('active-tab')
        $('#overview').removeClass('active-tab')
        $('#history').removeClass('active-tab')
        $('#wallet').removeClass('active-tab')

        $('.info').removeClass('hide').addClass('grid')
        $('.history').addClass('hide')
        $('.overview').addClass('hide')
        $('.wallet').addClass('hide')
    })
    $('#wallet').click(function() {
        $('#wallet').addClass('active-tab')
        $('#overview').removeClass('active-tab')
        $('#history').removeClass('active-tab')
        $('#info').removeClass('active-tab')

        $('.wallet').removeClass('hide')
        $('.history').addClass('hide')
        $('.info').addClass('hide').removeClass('grid')
        $('.overview').addClass('hide')
    })
   
})