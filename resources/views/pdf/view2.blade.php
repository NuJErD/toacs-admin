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
			height: 30px;
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
			@font-face {
            font-family: 'angsana';
			font-style: normal;
            font-weight: normal;
            src: url("{{ asset('fonts/ANGSA.ttf') }}") format('truetype');
             }  

        body {
			font-family: 'THSarabunNew',sans-serif;
			
            line-height: 20px;
            /* font-family: 'THSarabunNew';
            line-height: 20px; */
			
			margin-top: 285px;
			margin-bottom: 100px;
        }
		
        
        th {
            border: 1px solid #000000;
			
        }
		td{
			border-right: 1px solid #000000;
      		border-left: 1px solid #000000;
			
			
			
		}
		.list_po td {
      		border-bottom: 1px solid #000000; /* Adjust the color and width as needed */
			padding-bottom: 30px;
    	}
		.list_po_first td{
			padding-top: 20px;
			
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
		<p style="text-align: center; margin: 4px; display: inline-block; margin-left:100px ">
			<img src="{{url('/picture/logo.jpg')}}" alt="logo" style="width:55px; height:55px;">
			
		</p>
		<div style="display: inline-block;  line-height: 0.68;">
			
			<p style="text-align: center;  margin: 0px;"><b  style="font-size: 2rem;  ">&nbsp;บริษัท โทแอคส์ (ประเทศไทย) จำกัด <b style="font-size: 24px">(สำนักงานใหญ่)</b></b></p>
			<p style="  margin:0px; margin-bottom: 0px;"><b style="font-size: 2rem; margin-left: 8px; ">TOACS (THAILAND) CO.,LTD.  <b style="font-size: 24px"> (Head Office)</b></b></p>			
		</div>
		<div style="line-height: 0.8;">
		<p style="text-align: center; font-size: 18px; margin: 0px;"><b style="font-size: 18px;">700/65 หมู่ 6 ตำบลคลองตำหรุ อำเภอเมือง
			จังหวัดชลบุรี
			20000 โทร: (038) 213289-91 ต่อ 1123, 1124</b></p>
		<p style="text-align: center; font-size: 18px; margin: 0px;"><b>700/65 MOO 6 T. Klongtamru A. Muang Cholburi 20000
            TEL : (038) 213289-91 EXT : 1123, 1124</b></p>
			<p style="text-align: center; font-size: 18px; margin: 0px;"><b>TAX ID : 0105537115262 &nbsp; E-MAIL : purchasing@toacs.co.th</b></p>
		</div>
		
		<p style="text-align: center; font-size: 1.75rem; margin: 5px; margin-bottom: 15px;"><b><u>PURCHASE ORDER</u></b></p>
		
		<section class="row" >
			<div class="column" style="float: left; font-size: 20px; width: 50%; height: 150px; margin-right:130px; margin-top:37.5px;">
				<p style="margin-top:0px;line-height:0.6; display:inline-block; vertical-align: top; "><b>TO:</b></p> 
					
				<p style="margin:0px; word-break: break-all;  line-height:0.6; display:inline-block; width:300px; vertical-align: top;margin-left:20px;"><b>SIAM CARTON PACKAGING CO.,LTD. 1004 CHALONGKRUNG ROAD,LAMPLATHIEW,LADKRABANG,BANGKOK 10520<br> TELL: 02-7373371-2(114) FAX:02-7373373</b></p>
				<p style="margin:0px;  line-height:0.7;"><b style="">ATTN : K.PRAMOTE,K.KAMPL
				</b></p>
			</div>
				
			
			<div class="column" style="float:left; font-size: 20px; text-align: left; width: 50%; height: 150px; margin-top:30px;">
				<p style="margin:0px; line-height:1;"><b>P/O NO :<b style="margin-left:7px;"> {{$po->order_invoice}}</b></p>
				<p style="margin:0px; line-height:0.8;"><b>DATE : <b style="margin-left:22px;">{{$po->supplier_code}}</b></b></p>
				<p style="margin:0px; line-height:0.8;"><b>NO. : <b style="margin-left:32px;">77096</b></p>
				
				<p style="margin:-5px; margin-left:1px; line-height:1.1;"><b>DELIVERY PHASE :</b> </p>
			</div>
			
		</section>
	</header>

    <footer>
	
		
		
		<table border-collapse="collapse" style="width:100%; border: none; ">
			
			
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
			<tr>
				<td style="border:none; text-align:center;line-height:0.5">RECEIVED SIGNATURE</td>
				<td style="border:none; text-align:center; padding-left:90px; line-height:0.5">AUTHORIZED SIGNATURE</td>
			</tr>
		</table>
		
		<div style="margin-left: -15px;margin-top:0	px ; font-size: 14px !important; text-align: right;"> PR4 A002 REV.5 </div>
	</footer>
<body>
    <section class="row">
    @foreach ($po_detail as $pageNumber => $page)
    <div style="page-break-before: {{ $pageNumber > 0 ? 'always' : 'auto' }}">
        <table style="width: 100%; border-collapse: collapse; padding-top:45px;">
            <thead>
                <tr>
                    <th style="text-align: center; font-size:18px; white-space: nowrap; line-height: 1; padding-bottom:7px;width:40px;">ITEM</th>
                    <th style="text-align: center; font-size: 18px; white-space: nowrap; line-height: 1; padding-bottom:7px;">DESCRIPTION </th>
                    <th style="text-align: center; font-size: 18px; white-space: nowrap; line-height: 1; padding-bottom:7px;width:50px;">REF.NO.</th>
                    <th style="text-align: center; font-size: 18px; white-space: nowrap; line-height: 1; padding-bottom:7px; width:45px;">UNIT</th>
                    <th style="text-align: center; font-size: 18px; 	 line-height: 1; padding-bottom:7px; width:70px; ">QUANTITY</th>
                    <th style="text-align: center; font-size: 18px; white-space: nowrap; line-height: 1; padding-bottom:7px; width:70px; ">UNIT PRICE</th>
                    <th style="text-align: center; font-size: 18px; white-space: nowrap; line-height: 1; padding-bottom:7px;width:80px;">AMOUNT</th>
                </tr>
            </thead>
        <tbody style="border-collapse: separate; line-height: 0.62; " >
        @php  $counter = 0;  @endphp
        @foreach($page as $index =>  $row)
        <tr @if($index == 19) class="list_po" @endif @if($index == 0) class="list_po_first" @endif>
            <td
                style="text-align: left; font-size:20px; vertical-align: top; padding-right:.3rem; padding-left:.5rem; ">
                {{$index+1}}</td>
            <td
                style="font-size:20px; word-break: break-all; vertical-align: top; padding-right:.3rem; ">
                <b >{{$row['product_name']}}</b><b style="float: right; margin-right:40px; ">{{$row['p_code']}}</b></td>
            
            <td
                style="text-align: center; font-size:20px; vertical-align: top; white-space: nowrap; padding-right:.3rem; padding-left:.3rem;">
                </td>
            <td
                style="text-align: left; font-size:18px; vertical-align: top; padding-right:.3rem; padding-left:.2rem;">
                {{$row['unit']}}</td>
            <td
                style="text-align: right; font-size:18px; vertical-align: top; padding-right:.3rem; padding-left:.3rem;">
                {{number_format($row['QTY'],2)}}</td>
            <td	
                style="text-align: right; font-size:18px; vertical-align: top; padding-right:.3rem; padding-left:.3rem;">
                {{number_format($row['price'],2)}}</td>
            <td
                style="text-align: right; font-size:18px; vertical-align: top; white-space: nowrap; padding-right:.3rem; padding-left:.3rem;">
                {{number_format($row['total'],2)}}</td>
                
                
        </tr>
        @php  $counter = $index+1; @endphp
        @endforeach
        {{$pageNumber}}
        @for ($i = $counter; $i < 20; $i++)
        <tr @if($i == 19) class="list_po" @endif >

            <td >&nbsp;</td>
            <td >&nbsp;</td>
            <td >&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            
          
          </tr>

		@endfor 
       </tbody>
       @if($loop->last)
       <tr style="margin-top: 40px; line-height: 1;margin-bottom:10px;">
        <td colspan="4" style=" border:none;">Delivery Date: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 22/01/2024</td>
        
        <td colspan="2" 
            style="text-align: left; font-size: 20px; vertical-align: middle; white-space: nowrap; ">
            <b style="margin-left:5px">SUB TOTAL</b>
        </td>
        <td
            style="text-align: right; vertical-align: middle; font-size: 20px; padding-right:.3rem; padding-left:.3rem; ">
            <b>{{$sum}}</b>
        </td>
    </tr>
    <tr style=" line-height: 0.7;">
        <td colspan="4" style=" border:none;">Payment Term: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;30 DAYS AFTER END OF MONTH</td>
        <td colspan="2"
            style="text-align: left; font-size: 20px; vertical-align: middle; white-space: nowrap;">
            <b style="margin-left:5px">Vat 7.00%</b>
        </td>
        <td
            style="text-align: right; vertical-align: middle; font-size: 20px; padding-right:.3rem; padding-left:.3rem;">
            <b>{{$vat}}</b>
        </td>
    </tr >
    <tr style=" line-height: 0.7;">
        <td colspan="4" style=" border:none;">Note: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DELIVERY {{$phase}}</td>
        <td colspan="2"
            style="text-align: left; font-size: 20px; vertical-align: middle; white-space: nowrap; border-bottom:1px solid:#000000">
            <b style="margin-left:5px">TOTAL AMOUNT</b>
        </td>
        <td
            style="text-align: right; ; vertical-align: middle; font-size: 20px; padding-right:.3rem; padding-left:.3rem;border-bottom:1px solid:#000000; padding-bottom:10px	">
            <b>{{$sumtotal}}</b>
        </td>
    </tr>
    @endif
    </table>
    </div>
    
    @endforeach
    </section>
    
</body>
</html>