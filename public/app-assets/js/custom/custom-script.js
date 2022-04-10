

function validateMyForm() {
    event.preventDefault();
    var atLeastOneIsChecked = $('input:checkbox').is(':checked');
    if (!atLeastOneIsChecked) {
        $('#erros-checkinput').text('you need to check atleast one permission').show();
    }
    else {
        $('#create-role-form').submit();
    }
}


//image preview for users creating and editing
$(".image").change(function () {

    if (this.files && this.files[0]) {
        let reader = new FileReader();

        reader.onload = function (e) {
            $('.image-preview').attr('src', e.target.result);
        };

        reader.readAsDataURL(this.files[0]);
    } else {
        alert('select a file to see preview');
        $('#previewHolder').attr('src', '');
    }
});


//make table row clickable
jQuery(document).ready(function ($) {
    $('*[data-href]').on('click', function () {
        window.location = $(this).data("href");
    });
});

//pos page

$(document).on('click', '.add-product-btn', function () {
    let name = $(this).data('name').toUpperCase();
    let id = $(this).data('id');
    let price = accounting.formatNumber($(this).data('price'),2);
    let image = $(this).data('image');
    // $(this).addClass('disabled');

    let html =
        `
            <div class="item gradient-shadow" id="item_${id}">
                        <div class="" style="display: inline-flex">
                            <img src="${image}" alt="" width="40px" height="40px">
                            <div class="title_and_price ml-2">
                                <div class="itemtitle">${name}</div>
                                <div class="itemprice">${price}</div>
                            </div>
                        </div>
                        <div class="quantity ml-auto">
                            <span data-id="item-${id}" class="add increasebyone"><i class="material-icons"
                                                             style="font-size: 30px">add</i></span>
                            <div data-id="item-1" class="inputquantity display-flex">
                                <input type="hidden" name="products[]" value="${id}">
                                <input type="number" name="quantities[]" class="product-quantity" value="1" min="1" data-id="item-${id}" data-price="${price}" id="item-${id}">
                            </div>
                            <span class="decreasebyone" data-id="item-${id}"> <i class="material-icons" style="font-size: 30px">remove</i></span>
                        </div>
                        <!--delete item-->
                        <div >
                            <a  data-id="${id}" class="btn-sm btn-floating waves-effect waves-light red deleteitem">
                            <i class="material-icons">delete</i>
                            </a>
                        </div>
                    </div>
        `;
    $('.cart-products').append(html);
    calculate_total();
});

$(document).on('click', '.deleteitem', function () {
    let id = $(this).data('id');
    $('#item_' + id).remove();
    $('#product-' + id).removeClass('disabled');
    calculate_total();
});

//increase quantity
$(document).on('click', '.increasebyone', function (e) {
    e.preventDefault();
    let id = $(this).data('id');
    $('#' + id).val(function (i, oldval) {
        return ++oldval;
    });

    let price = parseFloat($(this).closest('.item').find('.product-quantity').data('price'));
    console.log(price);
    let quantity = parseInt($(this).closest('.item').find('.product-quantity').val());
    $(this).closest('.item').find('.itemprice').html(accounting.formatNumber(quantity*price,2));
    calculate_total();
});

//decrease quantity
$(document).on('click', '.decreasebyone', function () {
    let id = $(this).data('id');
    $('#' + id).val(function (i, oldval) {
        if (oldval > 2) {
            return --oldval;
        }
        else {
            return 1;
        }
    });
    let price = parseFloat($(this).closest('.item').find('.product-quantity').data('price'));
    let quantity = parseInt($(this).closest('.item').find('.product-quantity').val());
    $(this).closest('.item').find('.itemprice').html(accounting.formatNumber(quantity*price,2));
    calculate_total();
});

//recalculate item price when changing quantity
$(document).on('key change', '.product-quantity', function () {
    let quantity = parseInt($(this).val());
    let price = parseFloat($(this).data('price'));
    $(this).closest('.item').find('.itemprice').html(accounting.formatNumber(quantity*price,2));
    calculate_total();
});


//calculate total
function calculate_total() {
    let price = 0;
    $('.cart-products .itemprice').each(function (index) {
        price += parseFloat($(this).html().replace(/,/g,''));
    });
    $('.total-price').html(accounting.formatNumber(price, 2));

    console.log(price);
    if (price>0) {
        $('#create-order-form-btn').removeClass('disabled');
    }
    else {
        $('#create-order-form-btn').addClass('disabled');

    }
}

//add client id to a hidden input

$(document).on('change', '#client', function () {
    $('#client-hidden-input').val($('#client').find(":selected").val());
});

//verify form on submit


$('#create_order_form').submit(function (e) {
    if ($('#client').find(':selected').val() == -1) {
        e.preventDefault();
        $('.client-error-span').text("choisissez un client svp");
    }
    else {
        $('.client-error-span').text("");
        $('#create_order_form').submit();
    }
});










//live search for products
$('#product-search').on('keyup', function () {
    let search_content = $(this).val();
    let old_content = $('.products').html();
    if (search_content != '') {
        $.ajax({
            url: '/products/productsearch',
            method: 'GET',
            data: {search_content},
            dataType: 'json',
            success: function (data) {
                console.log(data.row_result);
                $('.products').html(data.row_result);
            }
        });

    }
    else {
        $('.products').html(old_content);
    }
});


//submit form using anchor tag

function submit_delete_form() {
    $('#deletee-order-form').submit();
}




