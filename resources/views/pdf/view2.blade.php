<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
         

        .flex-item {
           
            display: inline-block;
            
        }

        
    </style>
   
</head>
<body>
    @foreach ($po_detail as $pageNumber => $page)
    <div style="page-break-before: {{ $pageNumber > 0 ? 'always' : 'auto' }}">
        <table border="1" style="width: 100%;">
            <thead>
                <tr>
                    <th>Column 1</th>
                    <th>Column 2</th>
                    <th>Column 3</th>
                    <!-- Add more columns as needed -->
                </tr>
            </thead>
            <tbody>
                @foreach ($page as $row)
                    <tr>
                        <td>{{ $row['product_name'] }}</td>
                        <td>{{ $row['QTY'] }}</td>
                        <td>{{ $row['product_name'] }}</td>
                        <!-- Add more columns as needed -->
                    </tr>
                @endforeach
            </tbody><table border-collapse="collapse" style="width:100%; border: none; ">
			
			
                <tr style="">
                    <td colspan="4" style=" border:none; line-height:0.5"><b>Remark</b></td>
                </tr>
                <tr style="">
                    <td colspan="4" style=" border:none; line-height:0.5">1. Please confirm to us within 1 day if your received of e-mail purchase order.</td>
                </tr>
                <tr style="">
                    <td colspan="4" style=" border:none; line-height:0.5">2. If your cannot deliver as our delivery requirements.</td>
                </tr>
                <tr style="">
                    <td colspan="4" style=" border:none; line-height:0.5">(Please fill in เอกสารแจ้งเลื่อนการส่งสินค้า FR-PR-01 REV.02)</td>
                </tr>
            
                <tr>
                    <td style="border:none; width:100%; vertical-align: middle; padding-top:20px;">
                        <div style="text-align: center; font-size: 1rem;">
                            (………………………………………………………………………………)<br>
                        </div>
                    </td>
                    <td style="border:none; width:100%; vertical-align: middle;">
                        @if (isset($purchaseOrder->approve_admin['signature']))
                            <div style="text-align: center; font-size: 1rem;">
                                ( <img src="{{ url($purchaseOrder->approve_admin['signature']) }}"
                                    style="width: 250px; height: 80px; object-fit:cover;" /> )<br>
                            </div>
                        @else
                            <div style="text-align: center; font-size: 1rem; padding-top:20px; padding-left:90px;">
                                (………………………………………………………………………………)<br>
                            </div>
                        @endif
                    </td>
                </tr>
        </table>
        <div style="text-align: center; margin-top: 10px;">
            Page {{ $pageNumber + 1 }}
        </div>
    </div>
@endforeach

    
    
</body>
</html>