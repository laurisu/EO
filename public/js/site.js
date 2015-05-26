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

function data() {
    var x = myChartData.offerTotal;
    console.log(x); // bar

}

function applyResponsiveTable(selector) {
    $(selector).responsiveTable({
        pattern: 'priority-columns',
        stickyTableHeader: false,
        addFocusBtn: false
    });
}

function initOfferStats() {
    if ($('#myOfferStatsChart').length) {
        var ctx = $("#myOfferStatsChart").get(0).getContext("2d");
        var offer = myChartData.offer;

        var theMonths = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        var today = new Date();
        var lastSixMonths = [];
        
        for(var i = 6; i > 0; i -= 1) {
            d = new Date(today.getFullYear(), today.getMonth() +1 - i, 1);
            lastSixMonths.push(theMonths[d.getMonth()]);
            // months = theMonths[d.getMonth()];
        }   
        lastSixMonths.reverse();
        
        /* 
         * Offer status
         * 0 - products only 
         * 1 - products + customer 
         * 2 - sent
         * 3 - offer accepted 
         * 4 - offer rejected
         */
        var options = {
            responsive: true,
            maintainAspectRatio: false
        };
        var data = {
            labels: lastSixMonths,
            datasets: [
                {
                    label: 'Offers without feedback',
                    data: myChartData.sentData,
                    fillColor:          "rgba(72, 151, 204, 0.5)",
                    strokeColor:        "rgba(72, 151, 204, 0.8)",
                    highlightFill:      "rgba(72, 151, 204, 0.75)",
                    highlightStroke:    "rgba(72, 151, 204, 1)"
                },
                {
                    label: 'Accepted offers',
                    data: myChartData.accData,
                    fillColor:          "rgba(47, 159, 158, 0.5)",
                    strokeColor:        "rgba(47, 159, 158, 0.8)",
                    highlightFill:      "rgba(47, 159, 158, 0.75)",
                    highlightStroke:    "rgba(47, 159, 158, 1)"
                },
                {
                    label:'Rejected offers',
                    data: myChartData.rejData,
                    fillColor:          "rgba(251, 148, 139, 0.5)",
                    strokeColor:        "rgba(251, 148, 139, 0.8)",
                    highlightFill:      "rgba(251, 148, 139, 0.75)",
                    highlightStroke:    "rgba(251, 148, 139, 1)"
                }
            ]
        };
        var myLineChart = new Chart(ctx).Line(data, options);
        $('#myOfferStatsLegend').html(myLineChart.generateLegend());
    }
}

function initUserStats() {
    if ($('#myUserStatsChart').length) {
        var ctx = $("#myUserStatsChart").get(0).getContext("2d");
        
        var options = {
            responsive: true,
            maintainAspectRatio: false
        };
        var data = {
            labels: myChartData.users,
            datasets: [
                {
                    label: "Customers",
                    data: myChartData.customerTotal,
                    fillColor:          "rgba(244, 179, 80, 0.5)",
                    strokeColor:        "rgba(244, 179, 80, 0.8)",
                    highlightFill:      "rgba(244, 179, 80, 0.75)",
                    highlightStroke:    "rgba(244, 179, 80, 1)"
                },
                {
                    label: "Offers",
                    data: myChartData.offerTotal,
                    fillColor:          "rgba(47, 159, 158, 0.5)",
                    strokeColor:        "rgba(47, 159, 158, 0.8)",
                    highlightFill:      "rgba(47, 159, 158, 0.75)",
                    highlightStroke:    "rgba(47, 159, 158, 1)"
                }
            ]
        };
        var myBarChart = new Chart(ctx).Bar(data, options);
        $('#myUserStatsLegend').html(myBarChart.generateLegend());
    }
}

