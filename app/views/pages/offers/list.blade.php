@extends('layouts.default')

@section('title')
@parent
:: Offers
@stop

@section('content')

<div class="my-view-header-wrapper" data-spy="affix" data-offset-top="20">
    <div class="container-fluid my-max-width">
        <div class="row my-view-header">
            <div class="col-sm-4">
                <h4>Offers</h4>
            </div>
            <div class="col-sm-8 text-right">

            </div>  
        </div>
    </div>
</div>
<div class="my-view-header-wrapper-affix-replacer" data-spy="affix" data-offset-top="20"></div>

<div class="offer-container">
@if(!empty($cart))
    <div class="col-xs-12">
        <table class="table table-small-font table-hover my-table">
            <caption>
                Pending offer
            </caption>
            
            <thead>
                <tr>
                    <th>product id</th>
                    <th>name</th>
                    <th>price</th>
                    <th>description</th>
                </tr>
            </thead>
            
            <tfoot>
                <tr>
                    <td colspan="4">
                        <a href="" class="btn btn-xs my-tbl-btn-offer">Continue with offer... <i class="fa fa-long-arrow-right"></i></a>
                        <a href="{{{ route('offer-create-post') }}}" class="btn btn-xs my-tbl-btn-save"><i class="fa fa-floppy-o"> Save for later</i></a>
                        <a href="" class="btn btn-xs my-tbl-btn-delete"><i class="fa fa-trash-o"> Delete</i></a>
                    </td>
                </tr>
            </tfoot>
            
            <tbody>
                @foreach($cart as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->price }}</td>
                    <td>{{ $row->product->description }}</td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
 @endif   
    <div class="col-md-6">
        
        <div class="table-responsive" data-pattern="priority-columns">
            <table class="table table-small-font table-hover my-table">

                <caption>
                    Unfinished offers
                </caption>

                <thead>
                    <th>ID</th>
                    <th>Created</th>
                    <th>User</th>
                    <th>Customer</th>
                    <th>Status</th>
                </thead>

                <tbody>
                    @foreach($offers as $pendingOffer)
                        @if($pendingOffer->status == 0 or 1)
                        <tr>
                            <td>{{ $pendingOffer->id }}</td>
                            <td>{{ date('d M Y', strtotime($pendingOffer->updated_at)) }}</td>
                            <td>{{ $pendingOffer->author->name }}</td>
                            <td>
                                @if(isset($pendingOffer->recipient->customer))
                                    $pendingOffer->recipient->customer
                                @else
                                    n/a
                                @endif
                            </td>
                            <td>{{ $pendingOffer->status }}</td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
    
    <div class="col-md-6">

        <div class="table-responsive" data-pattern="priority-columns">
            <table class="table table-small-font table-hover my-table">

                <caption>
                    Sent offers
                </caption>

                <thead>
                    <th>ID</th>
                    <th>Sent at</th>
                    <th>User</th>
                    <th>Customer</th>
                    <th>Status</th>
                </thead>

                <tbody>
                    @foreach($offers as $sentOffer)
                        @if($sentOffer->status == 2)
                        <tr>
                            <td>{{ $sentOffer->id }}</td>
                            <td>{{ date('d M Y', strtotime($sentOffer->updated_at)) }}</td>
                            <td>{{ $sentOffer->author->name }}</td>
                            <td>{{ $sentOffer->receiver->customer }}</td>
                            <td>{{ $sentOffer->status }}</td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>

@stop