@extends('layouts.default')

@section('title')
@parent
:: Customers
@stop

@section('content')

<div class="my-view-header-wrapper" data-spy="affix" data-offset-top="20">
    <div class="container-fluid my-max-width">
        <div class="row my-view-header">
            <div class="col-sm-4">
                <h4>Customers</h4>
            </div>
            <div class="col-sm-8 text-right">
                <button class="btn btn-sm my-view-header-btn">{{ HTML::linkRoute('customer-create', 'Add customer') }}</button>
                <button class="btn btn-sm my-view-header-btn" type="button" data-toggle="collapse" data-target="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters">
                    Search
                </button>
            </div>  
        </div>
        <div class="row">
            <div class="collapse" id="collapseFilters">
                <div class="well my-well">
                    <div class="my-well-container">
                        <div class="col-xs-12 col-sm-4 pull-right">
                            <form name="" action="{{ URL::route('customer-list') }}" method="GET">
                                <div class="input-group"> 
                                    <!--<span class="input-group-addon">Search box</span>-->
                                    <input type="text" name="search" class="form-control my-search-input" placeholder="Type here...">
                                    <div class="input-group-btn">
                                        <button class="btn my-view-header-btn" type="submit">
                                            <i class="glyphicon glyphicon-search"></i>
                                        </button>
                                    </div>
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

<div class="table-responsive" data-pattern="priority-columns">
    <table class="table table-small-font table-hover my-table">

        <caption>Customers list</caption>
        <thead>
            <tr>
                <th data-priority="1">Company</th>
                <th data-priority="1">Contact</th>
                <th data-priority="2">Mobile</th>
                <th data-priority="4">Office</th>
                <th data-priority="3">Email</th>
                <th data-priority="1">Options</th>
            </tr>
        </thead>
        <tbody>

            @foreach($customers as $customer)
            <tr>
                <td>{{ $customer->customer }}</td>
                <td>{{ $customer->contact_person }}</td>
                <td>{{ $customer->mobile }}</td>
                <td>{{ $customer->phone }}</td>
                <td><a href="mailto:{{ $customer->email }}">{{ $customer->email }}</a></td>
                <td class="col-xs-1">
                    <span
                        data-toggle="tooltip"
                        data-placement="left"
                        title="View customer profile">
                        <button 
                            type="button" 
                            href="{{ route('customer-view', array($customer->id)) }}" 
                            class="btn btn-xs my-tbl-btn-view open-customer-view"  
                            data-target="#myModal">
                            <i class="fa fa-eye"></i>
                        </button>
                    </span>
                    <a
                        type="button" 
                        href="{{ route('customer-edit', array($customer->id)) }}"
                        class="btn btn-xs my-tbl-btn-edit"
                        data-toggle="tooltip"
                        data-placement="left"
                        title="Edit customer profile">
                        <i class="fa fa-pencil"></i>
                    </a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
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
<div>
    {{ $customers->links() }}
</div>
@stop