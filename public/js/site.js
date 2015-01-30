$('.open-product-view').click(function(event){
    event.preventDefault();
    var id = $(this).data('id');
        console.log(id);
        // pass id to appropriate element here  
        $(".modal-header #myModalLabel").val(id);
        
});
