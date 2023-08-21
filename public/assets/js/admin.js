function toggleCategoriesForm() {
    $('.category-table').css('display', 'none');
    $('.add_category').css('display', 'block');
    $('.new-category').css('display', 'none');
    $('.back').css('display', 'block');
}

function toggleCategoriesList() {
        $('.category-table').css('display', 'table');
        $('.add_category').css('display', 'none');
        $('.new-category').css('display', 'block');
}
function toggleaddProduct() {
    $('#products_display_table').css('display', 'none');
    $('.add_product').css('display', 'block');
    $('.new-product').css('display', 'none');
    $('.back').css('display', 'block');
}

function toggleCatalogDisplay() {
    $('#products_display_table').css('display', 'table');
    $('.add_product').css('display', 'none');
    $('.new-product').css('display', 'block');
    $('.back').css('display', 'none');
}
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
   
})