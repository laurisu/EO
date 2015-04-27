@extends('layouts.default')

@section('title')
@parent
:: Offer
@stop

@section('content')

<div class="my-crud-form">

    <div class="col-sm-12 my-form-headding">
        <h4>Offer view</h4>
    </div>

    <form class="form-horizontal" action="" method="post">

        <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">Product name</label>
            <div class="col-sm-4">
                <input 
                    type="text" name="product_name" 
                    class="form-control" id="inputName"
                    placeholder="Product name" 
                    value="" autofocus>
 
            </div>
        </div>


    </form>

</div>


@stop

