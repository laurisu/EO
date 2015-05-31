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
            <div class="col-sm-8 my-view-header-nav text-right">
                <!--Additiona options could be put here-->
            </div>  
        </div>
    </div>
</div>
<div class="my-view-header-wrapper-affix-replacer" data-spy="affix" data-offset-top="20"></div>

<div class="offer-container">
@if(!empty($cart))

    <div class="col-xs-12">
        <div class="table-responsive" data-pattern="priority-columns">
            <table class="table table-small-font table-hover my-table">
                <caption>
                    Current offer: Product management - stage 1 of 3
                </caption>

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>name</th>
                        <th>price</th>
                        <th>description</th>
                        <th>options</th>
                    </tr>
                </thead>

                <tfoot>
                    <tr>
                        <td colspan="5">
                            <a href="{{{ route('offer-create-post') }}}" class="btn btn-xs my-tbl-btn-offer">Save and continue... <i class="fa fa-long-arrow-right"></i></a>
                            <a href="{{ route('empty-cart') }}" class="btn btn-xs my-tbl-btn-delete"><i class="fa fa-trash-o"> Delete</i></a>
                        </td>
                    </tr>
                </tfoot>

                <tbody>
                    @foreach($cart as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->price }}</td>
                        <td class="my-td-ellipsis"><div>{{ $row->product->description }}</div></td>
                        <td class="col-xs-1">
                            <a 
                                href="{{ route('remove-from-offer', $row->rowid) }}" 
                                class="btn btn-xs my-tbl-btn-delete"
                                >
                                <i class="fa fa-trash"></i> Remove
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
 @endif   
    <div class="col-md-6">
        
        <div class="table-responsive" data-pattern="priority-columns">
            <table class="table table-small-font table-hover my-table">

                <caption>
                    Unfinished offers
                </caption>

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Created</th>
                        <th>User</th>
                        <th>Customer</th>
                        <th>Options</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($pendingOffers as $offer)
                        @if($offer->status < 2)
                        <tr>
                            <td>{{ $offer->id }}</td>
                            <td>{{ date('d M Y', strtotime($offer->updated_at)) }}</td>
                            <td>{{ $offer->author->name . ' ' . $offer->author->surname }}</td>
                            <td>
                                @if(isset($offer->recipient->customer))
                                    {{ $offer->recipient->customer }}
                                @else
                                    n/a
                                @endif
                            </td>
                            <td class="col-xs-1">
                                @if($offer->status == 0)
                                    <a 
                                        href="{{ route('offer-add-customer', array('id' => $offer->id)) }}" 
                                        class="btn btn-xs my-tbl-btn-edit"
                                        data-toggle="tooltip"
                                        data-placement="left"
                                        title="Add recipient">
                                        <i class="fa fa-user-plus"></i>
                                    </a>
                                @elseif($offer->status == 1)
                                    <a 
                                        href="{{ route('view-offer', array('id' => $offer->id)) }}" 
                                        class="btn btn-xs my-tbl-btn-view"
                                        data-toggle="tooltip"
                                        data-placement="left"
                                        title="View and send offer">
                                        <i class="fa fa-paper-plane"></i>
                                    </a>
                                @endif
                                <span 
                                    data-toggle="tooltip"
                                    data-placement="left"
                                    title="Delete offer">
                                    <button
                                        type="button"
                                        class="btn btn-xs my-tbl-btn-delete" 
                                        data-toggle="modal" 
                                        data-target="#confirmDelete" 
                                        data-test="test" 
                                        data-message='Are you sure you want to delete this offer (id: {{ $offer->id }})?'
                                        data-href="{{ route('offer-delete', array('offerId' => $offer->id)) }}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </span>  
                            </td>
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
                    <tr>
                        <th>ID</th>
                        <th>Sent at</th>
                        <th>User</th>
                        <th>Customer</th>
                        <th>Options</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($sentOffers as $offer)
                        @if($offer->status >= 2)
                        <tr>
                            <td>{{ $offer->id }}</td>
                            <td>{{ date('d M Y', strtotime($offer->created_at)) }}</td>
                            <td>{{ $offer->author->name . ' ' . $offer->author->surname }}</td>
                            <td>
                                @if(isset($offer->recipient->customer))
                                    {{ $offer->recipient->customer }}
                                @else
                                    n/a
                                @endif
                            </td>
                            <td class="col-xs-1">
                                @if($offer->status == 2)
                                    <a 
                                        href="{{ route('accept-offer', array('id' => $offer->id)) }}" 
                                        class="btn btn-xs my-tbl-btn-offer"
                                        data-toggle="tooltip"
                                        data-placement="left"
                                        title="Offer accepted by customer">
                                        <i class="fa fa-check"></i>
                                    </a>
                                    <a 
                                        href="{{ route('reject-offer', array('id' => $offer->id)) }}" 
                                        class="btn btn-xs my-tbl-btn-delete"
                                        data-toggle="tooltip"
                                        data-placement="left"
                                        title="Offer rejected by customer">
                                        <i class="fa fa-times"></i>
                                    </a>
                                @elseif($offer->status == 3)
                                    Accepted
                                @elseif($offer->status == 4)    
                                    Rejected
                                @endif
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>

@include('includes.delete_confirm')

@stop