$(function () {
    $('.open-product-view, .open-customer-view').click(function (event) {
        event.preventDefault();

        $.ajax({
            url: $(this).attr("href"),
            beforeSend: function(){
                $("#myModal .modal-content").html('<div class="my-loader-container"><div class="my-loader"></div></div>');
                $("#myModal").modal();
            },
            success: function(result){
                $("#myModal .modal-content").html(result);
            }
        });
    });
    
});