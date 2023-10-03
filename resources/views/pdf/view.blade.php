<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
		<!-- Edit -->
		@page{
			margin: 0cm 0cm;
		}
		header{
			position: fixed;
			display: block;
			top: 0cm;
			left: 0cm;
			right: 0cm;
			/*height: 0cm;*/
		}
		footer{
			position: fixed;
			display: block;
			bottom: 3cm;
			left: 0cm;
			right: 0cm;
			/*height: 3cm;*/
			height: 180px;
		}
		<!-- Edit -->
            @font-face {
            font-family: 'THSarabunNew';
            font-style:;
            font-weight: bold;
            src: url("{{ asset('fonts/THSarabunNew/THSarabunNewBold.ttf') }}") format('truetype');
             }
           
            @font-face {
                font-family:'THSarabunNew';
                font-style: normal;
                font-weight: normal;
                src: url("{{ asset('fonts/THSarabunNew/THSarabunNew.ttf') }}") format('truetype');
            }  

        body {
			font-family: 'THSarabunNew',sans-serif;
                line-height: 20px;
            /* font-family: 'THSarabunNew';
            line-height: 20px; */
			
			margin-top: 400px;
			margin-bottom: 300px;
        }

        td,
        th {
            border: 1px solid #ddd;
            /* padding-top: 8px; */
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }
		thead { display: table-header-group; }
		tfoot { display: table-footer-group; }
		
    </style>
</head>
	<header>
		<p style="text-align: center; margin: 0px;">
			<img src="{{url('/picture/logo.jpg')}}" alt="logo" style="width:30px; height:30px;">
			<b style="font-size: 1.5rem;">TOACS (THAILAND) CO.,LTD.</b>
		</p>
		<p style="text-align: center; font-size: 1.5rem; margin: 0px;"><b>บริษัท โทแอคส์ (ประเทศไทย) จำกัด</b></p>
		<p style="text-align: center; font-size: 1.1rem; margin: 0px;"><b>700/65 MOO 6 T. Klongtamru A. Muang Cholburi 20000
            TEL : (038) 213289-91 FAX : (038) 213507</b></p>
		<p style="text-align: center; font-size: 1.1rem; margin: 0px;"><b>700/65 หมู่ 6 ตำบลคลองตำหรุ อำเภอเมือง
			จังหวัดชลบุรี
			20000 โทร: (038) 213289-91 แฟ็กซ์ : (038) 213507</b></p>
		<p style="text-align: center; font-size: 1.1rem; margin: 0px;"><b>HEAD OFFICE TAX ID 0105537115262</b></p>
		<p style="text-align: center; font-size: 1.5rem; margin: 5px;"><b><u>PURCHASE ORDER</u></b></p>
		
		<section class="row">
			<div class="column" style="float: left; font-size: 16px; width: 50%; height: 150px;">
				<p style="margin:0px;"><b>TO: <span
					style="word-break: break-all;"></span></b></p>
				<p style="margin:0px;"><b>ATTN :  Mobile
					</b></p>
				<p style="margin:0px;">E-Mail : it.office.equipment@gmail.com</p>
				<p style="margin:0px;">PERSON IN CHARGE :  Ext.1123 Mobile 097-0151578</b>
				</p>
				<p style="margin:0px;">E-Mail : anjanya@toacs.co.th</p>
			</div>
			<div class="column" style="float: left; font-size: 16px; text-align: right; width: 50%; height: 150px;">
				<p style="margin:0px;"><b>P/O NO :</b></p>
				<p style="margin:0px;"><b>Supplier Code : </b></p>
				<p style="margin:0px;"><b>QUOTATION NO. : </p>
				@if(!empty($purchaseOrder->quotation_2))
					<p style="margin:-5px;"><b>{{ $purchaseOrder->quotation_2 }}</p>
				@else
					<p style="margin:-5px;"><b><br></p>
				@endif
				@if(!empty($purchaseOrder->quotation_3))
					<p style="margin:-5px;"><b>{{ $purchaseOrder->quotation_3 }}</p>
				@else
					<p style="margin:-5px;"><b><br></p>
				@endif
				@if(!empty($purchaseOrder->quotation_4))
					<p style="margin:-5px;"><b>{{ $purchaseOrder->quotation_4 }}</p>
				@else
					<p style="margin:-5px;"><b><br></p>
				@endif
				<p style="margin:-5px;"><b>DATE :</b> </p>
			</div>
		</section>
	</header>
	
	<footer>
	
		<table style="width: 100%; border-collapse: collapse;">
			<tr>
				<td colspan="8" style="text-align: left; vertical-align: top; font-size: 1rem; padding-right:.3rem; padding-left:.3rem; word-wrap:break-word; table-layout: fixed; height: 40px; overflow:hidden;">
					Note:&nbsp;
				</td>
			</tr>
			<tr>
				<td colspan="8" style="text-align: left; font-size: 1rem; padding-right:.3rem; padding-left:.3rem;">
					Please tick mark (/) to indicate your delivery confirmation and reply back to us , within 1 day by E-mail
				</td>
			</tr>
			<tr>
				<td></td>
				<td colspan="7" style="text-align: left; font-size: 1rem; padding-right:.3rem; padding-left:.3rem;">
					Yes,if you can delivery as our delivery requirements.</td>
			</tr>
			<tr>
				<td></td>
				<td colspan="7" style="text-align: left; font-size: 1rem; padding-right:.3rem; padding-left:.3rem;">
					No,if you cannot as our delivery requirements( Please fill in your can delivery on ………………………………………)</td>
			</tr>
		</table>
		
		<table border-collapse="collapse" style="width:100%; border: none; ">
			<tr>
				<td style="border:none; width:100%; vertical-align: middle; padding-top:50px;">
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
						<div style="text-align: center; font-size: 1rem; padding-top: 50px;">
							(………………………………………………………………………………)<br>
						</div>
					@endif
				</td>
			</tr>
			<tr>
				<td style="border:none; text-align:center;">ACCEPTED BY SELLER</td>
				<td style="border:none; text-align:center;">AUTHORIZED SIGNATURE</td>
			</tr>
		</table>
		
		<div style="margin-left: -15px;margin-top: 20; font-size: 14px !important;"> PR4 A002 REV.4 </div>
	</footer>
	
<body>
	{{-- <!--<section class="row">
		<div class="column" style="float: left; font-size: 16px; width: 50%; height: 150px;">
			<p style="margin:0px;"><b>TO: {{ $purchaseOrder->supplier_name }} <span
				style="word-break: break-all;">{{ $purchaseOrder->supplier_address }}</span></b></p>
			<p style="margin:0px;"><b>ATTN : {{ $purchaseOrder->supplier_name }} Mobile
				{{ $purchaseOrder->supplier_phone }}</b></p>
			<p style="margin:0px;">E-Mail : it.office.equipment@gmail.com</p>
			<p style="margin:0px;">PERSON IN CHARGE : {{ $purchaseOrder->admin_name }} Ext.1123 Mobile 097-0151578</b>
			</p>
			<p style="margin:0px;">E-Mail : anjanya@toacs.co.th</p>
		</div>
		<div class="column" style="float: left; font-size: 1.3rem; text-align: right; width: 50%; height: 150px;">
			<p style="margin:0px;"><b>P/O NO : {{ $purchaseOrder->order_invoice }}</b></p>
			<p style="margin:0px;"><b>Supplier Code : {{ $purchaseOrder->supplier_code }}</b></p>
			<p style="margin:0px;"><b>QUOTATION NO. : {{ $purchaseOrder->quotation_1 }}</p>
			@if(!empty($purchaseOrder->quotation_2))
				<p style="margin:0px;"><b>{{ $purchaseOrder->quotation_2 }}</p>
			@endif
			@if(!empty($purchaseOrder->quotation_3))
				<p style="margin:0px;"><b>{{ $purchaseOrder->quotation_3 }}</p>
			@endif
			@if(!empty($purchaseOrder->quotation_4))
				<p style="margin:0px;"><b>{{ $purchaseOrder->quotation_4 }}</p>
			@endif
			<p style="margin:0px;"><b>DATE : {{ date('d-M-y', strtotime($purchaseOrder->created_at)) }}</b> </p>
		</div>
	</section> --> --}}
	<section class="row">
		<table style="width: 100%; border-collapse: collapse;">
		{{-- <!-- @if (count($purchaseOrderProducts) >= 3) page-break-after:always; @endif}} --> --}}
		<thead>
			<tr>
				<th style="text-align: center; font-size: 1rem; white-space: nowrap;">ITEM</th>
				<th style="text-align: center; font-size: 1rem; white-space: nowrap;">DESCRIPTION</th>
				<th style="text-align: center; font-size: 1rem; white-space: nowrap;">DELIVERY TO</th>
				<th style="text-align: center; font-size: 1rem; white-space: nowrap;">DELIVERY ON</th>
				<th style="text-align: center; font-size: 1rem; white-space: nowrap;">QUANTITY</th>
				<th style="text-align: center; font-size: 1rem; white-space: nowrap;">UNIT</th>
				<th style="text-align: center; font-size: 1rem; white-space: nowrap;">UNIT PRICE</th>
				<th style="text-align: center; font-size: 1rem; white-space: nowrap;">AMOUNT</th>
			</tr>
		</thead>
			{{-- @foreach ($purchaseOrderProducts as $key => $purchaseOrderProduct) --}}
				{{-- @php
					$orderPhase = App\Models\Phase::where('id', $purchaseOrderProduct->order_phase_id)->first();
				@endphp --}}
			<tbody>
				<tr>
					<td
						style="text-align: center; font-size: 1rem; vertical-align: top; padding-right:.3rem; padding-left:.3rem;">
					</td>
					<td
						style="font-size: 1rem; word-break: break-all; vertical-align: top; padding-right:.3rem; padding-left:.3rem;">
						</td>
					<td
						style="text-align: center; font-size: 1rem; vertical-align: top; white-space: nowrap; padding-right:.3rem; padding-left:.3rem;">
						</td>
					<td
						style="text-align: center; font-size: 1rem; vertical-align: top; white-space: nowrap; padding-right:.3rem; padding-left:.3rem;">
						</td>
					<td
						style="text-align: center; font-size: 1rem; vertical-align: top; padding-right:.3rem; padding-left:.3rem;">
						</td>
					<td
						style="text-align: center; font-size: 1rem; vertical-align: top; padding-right:.3rem; padding-left:.3rem;">
						</td>
					<td
						style="text-align: right; font-size: 1rem; vertical-align: top; padding-right:.3rem; padding-left:.3rem;">
						</td>
					<td
						style="text-align: right; font-size: 1rem; vertical-align: top; white-space: nowrap; padding-right:.3rem; padding-left:.3rem;">
					</td>
				</tr>
			</tbody>
			{{-- @endforeach --}}
			
			{{-- @php
				$totalVat = $purchaseOrder->total_price * ($purchaseOrder->vat / 100);
			@endphp --}}
			<tr style="margin-top: 40px;">
				<td colspan="5" rowspan="3">Payment Term: 30 DAYS AFTER END OF MONTH</td>
				<td colspan="2"
					style="text-align: center; font-size: 1rem; vertical-align: middle; white-space: nowrap;">
					<b>SUB TOTAL</b>
				</td>
				<td
					style="text-align: right; vertical-align: middle; font-size: 1rem; padding-right:.3rem; padding-left:.3rem;">
					<b></b>
				</td>
			</tr>
			<tr>
				<td colspan="2"
					style="text-align: center; font-size: 1rem; vertical-align: middle; white-space: nowrap;">
					<b>Vat %</b>
				</td>
				<td
					style="text-align: right; vertical-align: middle; font-size: 1rem; padding-right:.3rem; padding-left:.3rem;">
					<b></b>
				</td>
			</tr>
			<tr>
				<td colspan="2"
					style="text-align: center; font-size: 1rem; vertical-align: middle; white-space: nowrap;">
					<b>TOTAL AMOUNT</b>
				</td>
				<td
					style="text-align: right; vertical-align: middle; font-size: 1rem; padding-right:.3rem; padding-left:.3rem;">
					<b></b>
				</td>
			</tr>
			<!--<tr>
				<td colspan="8" style="text-align: left; font-size: 1rem; padding-right:.3rem; padding-left:.3rem;">
					{{-- Note: {{ $purchaseOrder->note }} --}}
				</td>
			</tr>
			<tr>
				<td colspan="8" style="text-align: left; font-size: 1rem; padding-right:.3rem; padding-left:.3rem;">
					Please tick mark (/) to indicate your delivery confirmation and reply back to us , within 1 day by E-mail
				</td>
			</tr>
			<tr>
				<td></td>
				<td colspan="7" style="text-align: left; font-size: 1rem; padding-right:.3rem; padding-left:.3rem;">
					Yes,if you can delivery as our delivery requirements.</td>
			</tr>
			<tr>
				<td></td>
				<td colspan="7" style="text-align: left; font-size: 1rem; padding-right:.3rem; padding-left:.3rem;">
					No,if you cannot as our delivery requirements( Please fill in your can delivery on ………………………………………)</td>
			</tr>-->
		</table>
	</section>
	
</body>
</html>