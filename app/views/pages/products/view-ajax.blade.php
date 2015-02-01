<div class="modal-header my-modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title" id="myModalLabel">
        <b>{{ $product->product_name }}</b> <small>(Product id: {{ $product->id }})</small>
    </h4>
</div>
<div class="modal-body">
    
        {{ $product->description }}
        <br>
        <span></span>
        <span></span>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div> 