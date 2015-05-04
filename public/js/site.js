$(function () {
    
    /**
     *  Modal windows
     */
    $('.ajax-product-view, .open-customer-view ').click(function (event) {
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
    //  Override RWD-Table-Patterns responsive tables plugin default values
    $('.btn-group').children().removeClass('btn-default').addClass('btn-sm my-table-toolbar-btn');

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
    var scrollSpyOffset = 95;

    $('body').scrollspy({
        offset: scrollSpyOffset,
        target: '.my-view-header-nav'
    });

    $('.my-view-header .nav a').click(function (event) {        
        event.preventDefault();
        $($(this).attr('href'))[0].scrollIntoView();
        scrollBy(0, -scrollSpyOffset);
    });
    
    /**
     * Bootstrap 3 Tooltip
     */
    $('[data-toggle="tooltip"]').tooltip();
    
    /**
     * Chart.js 
     */
    initOfferStats();
    initUserStats();
    data();
});

function data(){
    var offer = myChartData.offer;
    var user = myChartData.user;
    
    
    console.log(offer); // bar
    console.log(user[0].name); // User Obj
    
}

function applyResponsiveTable(selector) {
    $(selector).responsiveTable({
        pattern: 'priority-columns',
        stickyTableHeader: false,
        addFocusBtn: false
    });
}

function initOfferStats() {
    if($('#myOfferStatsChart').length){
        var ctx = $("#myOfferStatsChart").get(0).getContext("2d");
        var offer = myChartData.offer;

        var data = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
                    {
                    label: "My First dataset",
                    fillColor: "rgba(220,220,220,0.5)",
                    strokeColor: "rgba(220,220,220,0.8)",
                    highlightFill: "rgba(220,220,220,0.75)",
                    highlightStroke: "rgba(220,220,220,1)",
                    data: [65, 59, 80, 81, 56, 55, 40]
                },
                {
                    label: "My Second dataset",
                    fillColor: "rgba(151,187,205,0.5)",
                    strokeColor: "rgba(151,187,205,0.8)",
                    highlightFill: "rgba(151,187,205,0.75)",
                    highlightStroke: "rgba(151,187,205,1)",
                    data: [28, 48, 40, 19, 86, 27, 90]
                }
            ]
        };
        var myNewChart = new Chart(ctx).Line(data, {
            responsive: true,
            maintainAspectRatio: false
        });
    }
}

function initUserStats() {
    if($('#myUserStatsChart').length) {
        var ctx = $("#myUserStatsChart").get(0).getContext("2d");
        var user = myChartData.user;

        var data = {
            labels: ["User 1", "User 2", "User 3", "User 4", "User 5", "User 6", "User 7"],
            datasets: [
                {
                label: "My First dataset",
                fillColor: "rgba(220,220,220,0.5)",
                strokeColor: "rgba(220,220,220,0.8)",
                highlightFill: "rgba(220,220,220,0.75)",
                highlightStroke: "rgba(220,220,220,1)",
                data: [65, 59, 80, 81, 56, 55, 40]
            },
            {
                label: "My Second dataset",
                fillColor: "rgba(151,187,205,0.5)",
                strokeColor: "rgba(151,187,205,0.8)",
                highlightFill: "rgba(151,187,205,0.75)",
                highlightStroke: "rgba(151,187,205,1)",
                data: [28, 48, 40, 19, 86, 27, 90]
            },
            {
                label: "My Second dataset",
                fillColor: "rgba(156,187,255,0.5)",
                strokeColor: "rgba(156,187,255,0.8)",
                highlightFill: "rgba(156,187,255,0.75)",
                highlightStroke: "rgba(156,187,255,1)",
                data: [29, 35, 60, 5, 80, 80, 67]
            }
            ]
        };
        var myNewChart = new Chart(ctx).Bar(data, {
            responsive: true,
            maintainAspectRatio: false
        });
    }
}

