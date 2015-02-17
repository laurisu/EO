<div class="js-data">
    
<table class="js-products">
@foreach($products as $product)
    <tr>
        <td class="col-md-1">{{ $product->id }}</td>
        <td class="col-md-2">{{ $product->product_name }}</td>
        <td class="col-md-2 hidden-sm hidden-xs my-td-ellipsis" style="">
            <div>{{ $product->description }}</div></td>
        <td class="col-md-1 hidden-sm hidden-xs">
            <i class="fa fa-eur"></i> {{ $product->purchase_price }}</td>
        <td class="col-md-1">
            <i class="fa fa-eur"></i> {{ $product->retail_price }}</td>
        <td class="col-md-1">
            20 %</td>
        <td class="col-md-1">
            <i class="fa fa-eur"></i> </td>
        <td class="col-md-1">
            <i class="fa fa-eur"></i> </td>
        <td class="col-md-2">
            <button type="button" href="{{ route('product-view', array($product->id)) }}" class="btn btn-xs my-tbl-btn-view open-product-view"  data-target="#myModal"><i class="fa fa-eye"></i> View</button>
            <button class="btn btn-xs my-tbl-btn-offer">Add to offer</button>
            <button class="btn btn-xs my-tbl-btn-edit"><i class="fa fa-pencil"></i> {{ HTML::linkRoute('product-edit', 'Edit', array($product->id)) }}</button></td>
    </tr>
@endforeach
</table>
    
<div class="js-pages">
    {{ $products->links() }}
</div>
    
</div>

