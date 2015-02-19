<div class="js-data">

    <table class="js-products">
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
                <td>
                    <button type="button" href="{{ route('product-view', array($product->id)) }}" class="btn btn-xs my-tbl-btn-view open-product-view"  data-target="#myModal"><i class="fa fa-eye"></i> View</button>
                    <button type="button" class="btn btn-xs my-tbl-btn-offer">Add to offer</button>
                    <button type="button" class="btn btn-xs my-tbl-btn-edit"><i class="fa fa-pencil"></i> {{ HTML::linkRoute('product-edit', 'Edit', array($product->id)) }}</button>
                </td>
            </tr>
        @endforeach
    </table>

    <div class="js-pages">
        {{ $products->links() }}
    </div>

</div>

