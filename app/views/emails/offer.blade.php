<!DOCTYPE html>
<html>
    <body>
        <h4 style="font-style:italic">Dear {{ $recipient }},</h4>

        <div>
            This is our offer (offer id: {{ $offer }})
        </div>
        
        <div>
            <ul>
                @foreach($items as $item)
                <li>{{ $item->product->product_name }}</li>
                @endforeach
            </ul>
        </div>
        
        
        <div>
            Regards,<br>
            {{ $user }}   
        </div>
        
    </p>
</body>
</html>