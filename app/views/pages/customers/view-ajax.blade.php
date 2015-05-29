<div class="modal-header my-modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title" id="myModalLabel">
        <b>{{ $customer->customer }}</b>
    </h4>
</div>
<div class="modal-body">

    <dl class="dl-horizontal">
        <dt>Contact person</dt>
        <dd>{{ $customer->contact_person }}</dd>
        <dt>Mobile</dt>
        <dd>{{ $customer->mobile }}</dd>
        <dt>Phone</dt>
        <dd>{{ $customer->phone }}</dd>
        <dt>Email</dt>
        <dd>{{ $customer->email }}</dd>
        <dt>Address</dt>
        <dd>{{ $customer->address }}</dd>
        <dt>Web page</dt>
        <dd><a href="{{ $customer->web_page }}">{{ $customer->web_page }}</a></dd>
    </dl>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div> 