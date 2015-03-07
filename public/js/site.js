$(function () {
    $('.ajax-product-view, .ajax-product-edit, .open-customer-view ').click(function (event) {
        event.preventDefault();

        $.ajax({
            url: $(this).attr("href"),
            beforeSend: function () {
                $("#myModal .modal-content").html('<div class="my-loader-container"><div class="my-loader"></div></div>');
                $("#myModal").modal();
            },
            success: function (result) {
                $("#myModal .modal-content").html(result);
            }
        });
    });

    $('.js-ajax-search').on('submit', function (event) {
        event.preventDefault();

        $.ajax({
            url: $(this).attr("action"), // paņem linku no formas attr action un sūta uz to formas datus 
            type: $(this).attr("method"), // paņem metodi no formas
            data: $(this).serializeArray(), // sagatavo fromas datus sūtīšanai ar AJAX
            beforeSend: function () {
                $(".js-ajax-products").html('<div class="my-loader-container"><div class="my-loader"></div></div>');
                $(".js-ajax-pages").html('');
            },
            success: function (result) {
                $(".js-ajax-products").html($(result).find('.js-products').html());
                applyResponsiveTable('.table-responsive');
                
                $(".js-ajax-pages").html($(result).find('.js-pages').html());
            }
        });
    });
    
    // Responsive tables plugin
    applyResponsiveTable('.table-responsive', {
        
    });
    
});


function applyResponsiveTable(selector){
    $(selector).responsiveTable({
        pattern: 'priority-columns',
        stickyTableHeader: false,
        addFocusBtn: false
    });
}