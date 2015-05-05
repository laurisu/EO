<!DOCTYPE html>
<html>
    <head>
        <style>
            body {font-family: 'Open Sans', sans-serif; font-size: 12px;}
            .mail-head {font-style: italic;}
            table, th, td {border: 1px solid rgb(244, 179, 80);}
            thead {background-color: rgb(244, 179, 80);}
            th {padding: 10px;}
            td {padding: 10px;vertical-align: middle;}
            .col1 {width: 25%; border-right: 1px solid rgb(244, 179, 80);}
            .col2 {width: 10%; border-right: 1px solid rgb(244, 179, 80);}
            .col3 {width: 65%;}
            .mail-foot {font-style: italic;}
            .line {color: rgb(244, 179, 80);}
        </style>
    </head>
    <body>
        <div class="mail-head">
            <h4>Dear {{ $recipient }},</h4>
            <p>Below you can find our offer for requested products</p> 
        </div>
        <br>
        <div>
            <table>
                <thead>
                    <tr>
                        <th class="col1">Product</th>
                        <th class="col2">Price</th>
                        <th class="col3">Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                    <tr>
                        <td>{{ $item->product->product_name }}</td>
                        <td>{{ $item->product->retail_price }}</td>
                        <td>{{ $item->product->description }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3">Offer  expires on {{ $expiry_date }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <br>
        <div class="mail-foot">
            <p>Regards,</p>
            <p>{{ $user }}</p>
            <p>{{ $job_title }}</p>
            <p class="line">____________________________</p>
            <p>Easy Offer</p>
            <p>mob: {{ $phone }}</p>
            <p>mail: {{ $email }}</p>
        </div>
    </body>
</html>