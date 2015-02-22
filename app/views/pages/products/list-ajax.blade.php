<div class="js-data">

    <div class="js-products">
        <div class="table-responsive" data-pattern="priority-columns">
            <table class="table table-small-font table-hover my-table">

                <thead>
                    <tr>
                        <th data-priority="5">#</th>
                        <th data-priority="1">name</th>
                        <th data-priority="6">description</th>
                        <th data-priority="5">purchase<br> price <i class="fa fa-eur"></th>
                        <th data-priority="3">retail<br> price <i class="fa fa-eur"></th>
                        <th data-priority="5">discount</th>
                        <th data-priority="5">profit <i class="fa fa-eur"></th>
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
                            <button type="button" href="{{ route('product-view', array($product->id)) }}" class="btn btn-xs my-tbl-btn-view open-product-view"  data-target="#myModal"><i class="fa fa-eye"></i> View</button>
                            <button type="button" class="sb-toggle-left btn btn-xs my-tbl-btn-offer">Add to offer</button>
                            <button type="button" class="btn btn-xs my-tbl-btn-edit"><i class="fa fa-pencil"></i> {{ HTML::linkRoute('product-edit', 'Edit', array($product->id)) }}</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="js-pages">
        {{ $products->links() }}
    </div>

</div>

