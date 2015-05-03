@extends('layouts.default')

@section('title')
@parent
:: Products
@stop

@section('content')

<div class="my-view-header-wrapper" data-spy="affix" data-offset-top="20">
    <div class="container-fluid my-max-width">
        <div class="row my-view-header">
            <div class="col-xs-4">
                <h4>Products</h4>
            </div>
            <div class="col-xs-8 text-right">
                <button class="btn btn-sm my-view-header-btn">{{ HTML::linkRoute('product-create', 'Add product') }}</button>
                <button class="btn btn-sm my-view-header-btn" type="button" data-toggle="collapse" data-target="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters">
                    Search
                </button>
                <div class="my-options-toolbar text-right">
                    <!--Here goes the button toolbar from Responsive Table plugin (jQuery)-->
                </div>     
            </div>  
        </div>
        <div class="row">
            <div class="collapse" id="collapseFilters">
                <div class="well my-well">
                    <div class="my-well-container">
                        <div class="col-xs-12 col-sm-4 text-left">
                            <form class="js-ajax-search" name="" action="{{ URL::route('product-list') }}" method="GET">
                                <div class="input-group"> 
                                    <span class="input-group-addon">Filter</span>
                                    <!--<input type="text" class="form-control js-my-filter" placeholder="Type here...">-->
                                    <input type="text" name="search" class="form-control" placeholder="Type here...">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="my-view-header-wrapper-affix-replacer" data-spy="affix" data-offset-top="20"></div>


<div class="js-ajax-products">
    <div class="table-responsive" data-pattern="priority-columns">
        <table class="table table-small-font table-hover my-table">

            <?php
                // Retrieving GET parameters from query string
                $queryParameters = Input::query();
            ?>
            
            <thead>
                <tr>
                    <th data-priority="5">
                        
                        <?php
                            $queryParameters['sort'] = 'id';
                            if ($sortName == 'id' &&  $sortDirrection == 'ASC') {
                                $queryParameters['order'] = 'DESC';
                            } else {
                                $queryParameters['order'] = 'ASC';
                            }
                        ?>
                        <a href="{{{ route('product-list', $queryParameters) }}}" class="btn btn-sm my-view-header-btn">
                            #
                            @if( $queryParameters['order'] == 'DESC')
                                <i class="fa fa-arrow-down"></i>
                            @else
                                <i class="fa fa-arrow-up"></i>
                            @endif
                        </a>
                    </th>
                    <th data-priority="1">
                        <?php
                            $queryParameters['sort'] = 'name';
                            if ($sortName == 'name' &&  $sortDirrection == 'ASC') {
                                $queryParameters['order'] = 'DESC';
                            } else {
                                $queryParameters['order'] = 'ASC';
                            }
                        ?>
                        <a href="{{{ route('product-list', $queryParameters) }}}" class="btn btn-sm my-view-header-btn">
                            name
                            @if( $queryParameters['order'] == 'DESC')
                                <i class="fa fa-arrow-down"></i>
                            @else
                                <i class="fa fa-arrow-up"></i>
                            @endif
                        </a>
                    </th>
                    <th data-priority="6">description</th>
                    <th data-priority="5">purchase<br> price <i class="fa fa-eur"></th>
                    <th data-priority="3">retail<br> price <i class="fa fa-eur"></th>
                    <th data-priority="5">discount<br> &percnt;</th>
                    <th data-priority="5">profit<br> <i class="fa fa-eur"></th>
                    <th data-priority="1">offer<br> price <i class="fa fa-eur"></th>
                    <th data-priority="1">options</th>
                </tr>
            </thead>
            <tbody>

                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->product_name }}</td> 
                    <td class="my-td-ellipsis" style=""><div>{{ $product->description }}</div></td>
                    <td>{{ $product->purchase_price }}</td>
                    <td>{{ $product->retail_price }}</td>
                    <td>20 %</td>
                    <td>25.99</td>
                    <td>105.99</td>
                    <td class="col-xs-1">
                        @if(!empty($cart))
                            @if(Cart::search(array('id' => $product->id)) == TRUE)
                                <a href="{{ route('offers-list') }}" class="btn btn-xs my-tbl-btn-offer">To offer list</a>
                            @else
                                <a href="{{ route('add-to-offer', array($product->id)) }}" class="btn btn-xs my-tbl-btn-offer">Add to offer</a>
                            @endif
                        @else
                        <a href="{{ route('add-to-offer', array($product->id)) }}" class="btn btn-xs my-tbl-btn-offer">Add to offer</a>
                        @endif
                        <a href="{{ route('product-view', array($product->id)) }}" class="btn btn-xs my-tbl-btn-view ajax-product-view"  data-target="#myModal"><i class="fa fa-eye"></i></a>
                        <a href="{{ route('product-edit', array($product->id)) }}" class="btn btn-xs my-tbl-btn-edit " data-target="#myModal"><i class="fa fa-pencil"></i></a>
                        <!--<button type="button" href="" class="btn btn-xs my-tbl-btn-edit ajax-product-edit" data-target="#myModal"><i class="fa fa-pencil"></i> {{ HTML::linkRoute('product-edit', ' Edit', array($product->id)) }}</button>-->
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@stop

@section('pagination')
<div class="js-products-pagination js-ajax-pages">
    {{ $products->links() }}
</div>
@stop
