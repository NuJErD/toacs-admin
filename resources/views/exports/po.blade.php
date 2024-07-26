<table>
    <thead>
    <tr>
        <th style="font-size:14px; text-align: center; position: fixed;">Date</th>
        <th style="font-size:14px; text-align: center; position: fixed ;">PO</th>
        <th style="font-size:14px; text-align: center; position: fixed;">PR</th>
        <th style="font-size:14px; text-align: center; position: fixed;">Product_name</th>
        <th style="font-size:14px; text-align: center; position: fixed;">PART</th>
        <th style="font-size:14px; text-align: center; position: fixed;">QTY</th>
        <th style="font-size:14px; text-align: center; position: fixed;">PRICE</th>
        <th style="font-size:14px; text-align: center; position: fixed;">Total</th>
        <th style="font-size:14px; text-align: center; position: fixed;">Phase</th>
        <th style="font-size:14px; text-align: center; position: fixed;">Supplier</th>
    </tr>
    </thead>
    <tbody>
    @if($po)
    @foreach($po as $po)
        <tr>
            <td  style="font-size:12px; text-align: left;">{{ $po->create_date }}</td>
            <td  style="font-size:12px; text-align: left;">{{ $po->po_order_invoice }}</td>
            <td  style="font-size:12px; text-align: left;">PR_{{ $po->pr_code }}</td>
            <td  style="font-size:12px; text-align: left;">{{ $po->product_name }}</td>
            <td  style="font-size:12px; text-align: left;">{{ $po->product_code }}</td>
            <td  style="font-size:12px; text-align: left;">{{ $po->QTY }}</td>
            <td  style="font-size:12px; text-align: left;">{{ $po->price }}</td>
            <td  style="font-size:12px; text-align: left;">{{ $po->total }}</td>
            <td  style="font-size:12px; text-align: left;">{{ $po->phase }}</td>
            <td  style="font-size:12px; text-align: left;">{{ $po->supplier_name }}</td>
           
        </tr>
    @endforeach
    @else 
    <tr>
        <td  style="font-size:12px; text-align: left;"></td>
    </tr>
    @endif
    </tbody>
</table>


