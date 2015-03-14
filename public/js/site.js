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

    /**
     *  Responsive tables plugin
     */
    applyResponsiveTable('.table-responsive', {
    });

    /**
     *  Confirm delete modal window
     */
    $('.my-btn-delete').on('click', function (element) {
        element.preventDefault();
    });
    $('.js-delete-confirm').on('show.bs.modal', function (element) {

        // Wrom where we get information ((element)relatedTarget in this case button)
        $message = $(element.relatedTarget).data('message'); // data("message") = data-message attribute
        $(this).find('.modal-body').text($message); // $(this) is modal window (Sparta) 
        $title = $(element.relatedTarget).data('title'); // data("title") = data-title attribute
        $(this).find('.modal-title').text($title); // $(this) is modal window title (Sparta) 
        $confirmUrl = $(element.relatedTarget).data('href'); // data("href") = data-href attribute

        // $(this) - adds URL from data-href attribute on delete button to modal confirm button
        $(this).find('.modal-footer #confirm').attr('href', $confirmUrl);
    });

    /**
     * Bootstrap 3 Scrollspy
     */
    var scrollSpyOffset = 100;

    $('body').scrollspy({
        offset: scrollSpyOffset,
        target: '.my-view-header-nav'
    });
//
    $('.my-view-header .nav a').click(function (event) {
//        event.preventDefault();
//        var targetSelector = $(this).attr('href');
//        var targeElement = $(targetSelector);
//        var position = targeElement.offset().top;
//
//        // scroll to element
//        $('body').scrollTop(position - scrollSpyOffset -1);
        
        event.preventDefault();
        $($(this).attr('href'))[0].scrollIntoView();
        scrollBy(0, -scrollSpyOffset);
    });

});


function applyResponsiveTable(selector) {
    $(selector).responsiveTable({
        pattern: 'priority-columns',
        stickyTableHeader: false,
        addFocusBtn: false
    });
}