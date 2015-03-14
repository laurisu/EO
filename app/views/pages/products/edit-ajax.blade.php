<div class="modal-header my-modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title" id="myModalLabel">
        Edit product 
    </h4>
</div>
<div class="modal-body">

    <form class="form-horizontal" action="{{ URL::route('product-update', array($product->id)) }}" method="post">

        <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Product name</label>
            <div class="col-sm-4">
                <input 
                    type="text" name="product_name" 
                    class="form-control" id="inputName"
                    placeholder="Product name" 
                    value="{{ $product->product_name }}">
                @if($errors->has('product_name'))
                {{ $errors->first('product_name') }}
                @endif  
            </div>
        </div>

        <div class="form-group">
            <label for="description" class="col-sm-2 control-label">Description</label>
            <div class="col-sm-9">
                <textarea 
                    name="description" rows="5"
                    class="form-control" id="description"
                    placeholder="Description">{{ $product->description }}</textarea>
                @if($errors->has('description'))
                {{ $errors->first('description') }}
                @endif  
            </div>
        </div>

        <div class="form-group">
            <label for="purchase_price" class="col-sm-2 control-label">Purchase price</label>
            <div class="col-sm-3">
                <input 
                    type="text" name="purchase_price" 
                    class="form-control" id="purchase_price"
                    placeholder="Purchase price" 
                    value="{{ $product->purchase_price }}">
                @if($errors->has('purchase_price'))
                {{ $errors->first('purchase_price') }}
                @endif  
            </div>
        </div>

        <div class="form-group">
            <label for="retail_price" class="col-sm-2 control-label">Purchase price</label>
            <div class="col-sm-3">
                <input 
                    type="text" name="retail_price" 
                    class="form-control" id="retail_price"
                    placeholder="Retail_price" 
                    value="{{ $product->retail_price }}">
                @if($errors->has('retail_price'))
                {{ $errors->first('retail_price') }}
                @endif  
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-12 text-center">
                <button type="button" class="btn btn-sm my-btn-save" type="submit">
                    <i class="fa fa-floppy-o"></i> Save
                </button>
                <a href="{{{ route('product-list') }}}" type="button" class="btn btn-sm my-btn-back">
                    <i class="fa fa-list-alt"></i> Products list
                </a>
                {{ Form::token() }}
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
</div>