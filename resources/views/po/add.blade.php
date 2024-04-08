@extends('layout.main')
@section('sidebar')
@include('layout.sidebarBack')
@endsection
@section('content')

    <div class=" mt-6 mr-6 p-4 ">
        <div class="border border-gray-700  p-4">
        <div class=" grid md:grid-cols-2">
            <div class="">
                <h4 class="text-2xl flex items-center">
                    <img src="{{url('/picture/logo.jpg')}}" alt="LOGO" class="w-[8%]" > &nbsp; TOACS (THAILAND) CO.,LTD.  
                </h4> 
                <span>
                    <b>บริษัท โทแอคส์ (ประเทศไทย) จำกัด{{$po->order_invoice}}</b>
                <p>700/65 MOO 6 T. Klongtamru A. Muang Cholburi 20000 </p> 
                <p> TEL : (038) 213289-91 FAX : (038) 213507</p>
                <p>700/65 หมู่ 6 ตำบลคลองตำหรุ อำเภอเมือง จังหวัดชลบุรี 20000</p>
                <p> โทร: (038) 213289-91 แฟ็กซ์ : (038)213507</p>
                <b>HEAD OFFICE TAX ID 0105537115262</b>                  
               
                </span>
            </div>
            <div class="">
                <h4 class="text-2xl flex items-center justify-end">
                    <small class="float-right" style="margin-top: 12px;">Create Date:
                        {{$po->create_date}}</small>  
                        
                    </h4>
            </div>
        </div>
        <hr class="my-3">
        <div class=" grid md:grid-cols-2">
            <div class="">
                <h5 class="mb-1">
                    <u class="text-xl font-bold ">Supplier</u>
                </h5>
                <table>
                <tbody>
                    <tr>
                        <td><b>Code</b></td>
                        <td>:</td>
                        <td>{{$sup->s_code}}</td>
                    </tr>
                    <tr>
                        <td class=" whitespace-nowrap"><b>Supplier Name</b></td>
                        <td>:</td>
                        <td>{{$sup->SPnameTH}}</td>
                    </tr>
                    <tr>
                        <td class=" whitespace-nowrap"><b>Phone Number</b></td>
                        <td>:</td>
                        <td>{{$sup->phone}}</td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top;"><b>Address</b>
                            </td>
                        <td style="vertical-align: top;"><p>:</p></td>
                    
                        <td style="vertical-align: top;" class=" whitespace-pre-line">{{$sup->address}}</td>
                    </tr>
                </tbody>
            </table>
            </div>

            <div class="">
                <h5 class="mb-1">
                    <u class="text-xl font-bold ">Order Detail</u>
                </h5>
                <table>
                <tbody>
                    <tr>
                        <td><b>Order Invoice</b></td>
                        <td>:</td>
                        <td>{{$po->order_invoice}}</td>
                    </tr>
                    <tr>
                        <td class=" whitespace-nowrap"><b>Create By</b></td>
                        <td>:</td>
                        <td>{{$po->admin_name}}</td>
                    </tr>
                   
                   
                </tbody>
            </table>
            </div>
        </div>

        <hr class="my-3 border border-blue-800 ">
       
           
      
        {{-- <div class="">
            <table>
                <tbody>
                    <tr>
                        <th>PR(Ref.)</th>
                        <th>Productname</th>
                        <th>QYT</th>
                        <th>Unit</th>
                        <th>Price</th>
                        <th>Total Price</th>
                        <th>Expected Date</th>
                        <th>Note</th>
                        
                    </tr>
                </tbody>
            </table>
        </div> --}}
      
        <div class="relative overflow-x-auto">
            <div class="a">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 w-auto text-center">
                           PR(Ref.) 
                        </th>
                        <th scope="col" class="px-6 py-3 w-auto ">
                            <p class=" pl-7">Productname</p>
                        </th>
                        
                       
                        
                        <th scope="col" class="px-6 py-3"">
                            {{-- <i class="fa-solid fa-plus fa-2xl" style="color: #04b907;"></i> --}}
                        </th>
                    </tr>
                </thead>
                <tbody>
                   
                       
                        <tr id="POadd" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 " style="display: ">
                            <th scope="row" class=" px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-blue-200 text-center">
                             <select id="PRNO" class=" w-[150px] h-[25px]" onchange=" getproduct()">
                             
                             </select>
                            </th>
                            <td class="px-6 py-4 bg-blue-200 text-center text-gray-900">
                                <div class="w-[400px] ml-6 bg-white ">
                                <select class="" id="product-po"    data-te-select-init multiple >

                                 </select>
                                </div>
                            </td>
                          <div class="flex justify-center"><b><p class=" text-[red] ">{{$po->phase}}</p></b></div>
                          <div class="flex mb-2">
                            <span><b>วันที่ส่ง</b></span>
                            <span>
                                <script>
                                    window.onload = function() {
                                        var today = new Date().toISOString().split('T')[0];
                                        document.getElementById("DateCart").setAttribute("min", today);
                                    };
                                </script>
                                <input id="DateCart" value="{{$po->delivery_date}}" onchange="showbtnDATE()" type="date" class="border border-red-500 rounded-[3px] h-[30px] ml-3 pl-3" name="date" required/>
                                
    
                            </span>
                            {{-- @if($po->delivery_date == null)
                            <button id=""  class="ml-3 border border-black w-[80px] bg-green-500" onclick="add_date_deliver(document.getElementById('DateCart').value,{{$po->id}})">บันทึก</button>
                            @endif --}}
                            <button id="date_cf" style="display: none"  class="ml-3 border border-black w-[80px] bg-green-500" onclick="add_date_deliver(document.getElementById('DateCart').value,{{$po->id}})">บันทึก</button>
                        </div>
                            
                            <td class="px-6 py-4 bg-blue-200 text-center text-gray-900">
                             {{-- <i class="fa-solid fa-plus fa-xl hover:scale-110 hover:cursor-pointer hover:text-[#0a9b0d] text-[#000000]" ></i> --}}
                                <button class="fa-solid  hover:scale-110 hover:cursor-pointer hover:text-[#0a9b0d] text-[#000000] w-[80px] h-[30px] bg-white border border-black rounded-lg" onclick="po_add_detail({{$po->order_invoice}},document.getElementById('PRNO').value,document.getElementById('product-po').value)">เพิ่ม</button>
                            </td>
                           
                            
                        </tr>
                </tbody>
                
              </table>
            </div>
            
            <div class="b">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3"">
                                {{-- <i class="fa-solid fa-plus fa-2xl" style="color: #04b907;"></i> --}}
                            </th>
                            <th scope="col" class="px-6 py-3 w-auto text-center">
                               PR(Ref.) 
                            </th>
                            <th scope="col" class="px-6 py-3 w-auto text-center">
                                Productname
                            </th>
                            <th scope="col" class="px-6 py-3 w-auto text-center">
                                ProductCode
                            </th>
                            <th scope="col" class="px-6 py-3 w-[50px] text-center">
                                QTY 
                            </th>
                            <th scope="col" class="px-6 py-3 w-auto text-center">
                                Unit 
                            </th>
                            <th scope="col" class="px-6 py-3 w-auto text-center">
                                Price 
                            </th>
                            <th scope="col" class="px-6 py-3 w-auto text-center">
                                Total Price 
                            </th>
                            <th scope="col" class="px-6 py-3 w-auto text-center">
                                Expected Date 
                            </th>
                            <th scope="col" class="px-6 py-3 w-auto text-center">
                                Note 
                            </th>
                            
                            
                        </tr>
                    </thead>
                    <tbody id="">
                        @foreach ($list as $index => $item)
                        <tr  class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 " style="display: ">
                            <td class="pr-6 py-4 text-center text-gray-900 flex items-center justify-start mt-3" >
                                <i id="open_input{{$index+1}}" class="mt-[20px] h-[20px] w-[50px] fa-solid fa-xl fa-pen-to-square mr-3 hover:cursor-pointer hover:scale-105" onclick="openinput({{$index+1}})"></i>
                                {{-- <i id="save_amount{{$index+1}}" class="fa-solid fa-xl fa-pen-to-square mr-3 hover:cursor-pointer hover:scale-105" onclick="changeprice({{$index+1}})" style="display: none"></i> --}}
                                <button id="save_amount{{$index+1}}" class="h-[20px] bg-green-600 border-none   mr-3 hover:cursor-pointer hover:scale-105" onclick="changeprice({{$index+1}},{{$item->id}},document.getElementById('change'+{{$index+1}}).value,document.getElementById('totals'+{{$index+1}}).textContent,{{$item->QTY}},{{$item->price}},{{$item->pr_code}},'{{$item->product_code}}')" style="display: none">SAVE</button>
                                <i class="h-[20px] mt-[20px] fa-solid fa-trash-can fa-xl hover:cursor-pointer hover:scale-105 text-red-500" onclick="del_podetail({{$item->id}})"></i>
                                </td>
                            <th scope="row" class=" px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white  text-center">
                            
                                <p class=" w-[150px] h-[25px] text-center"><b>{{$index+1}}.</b> PR.{{$item->pr_code}}</p>
                        
                            </th>
                            <td class="px-6 py-4 w-auto  text-center text-gray-900">
                                <p class="w-[120px] h-[25px] text-center"> {{$item->product_name}}</p>
                                   
                            </td>
                            <td class="px-6 py-4 w-auto  text-center text-gray-900">
                                <p class="w-[150px] h-[25px] text-center"> {{$item->product_code}}</p>
                                   
                            </td>
                            <td class="px-6 py-4   text-center text-gray-900">
                                <input id="change{{$index+1}}" class="w-[50px] h-[30px] border border-red-600 text-center" style="display: none" value="{{$item->QTY}}" onkeyup="change_amount({{$index+1}},{{$item->pr_code}},{{$item->id}},this.value,{{$item->price}},'{{$item->product_code}}')" type="number" required min="0">
                                <p id="changeQTY{{$index+1}}" class="w-[50px] h-[30px] text-center"> {{$item->QTY}}</p>
                            </td>
                            <td class="px-6 py-4  text-center text-gray-900">
                                <p class="w-[70px] h-[25px]  text-center">{{$item->unit}}</p>
                            </td>
                            <td class="px-6 py-4  text-center text-gray-900">
                                <p class="w-[70px] h-[25px]  text-end" >{{$item->price}}</p>
                            </td>
                            <td class="px-6 py-4  text-center text-gray-900">
                                <p id="totals{{$index+1}}" class="w-[70px] h-[25px]  text-end" >{{number_format($item->total,2)}}</p>
                            </td>
                            <td class="px-6 py-4   text-center text-gray-900">
                                <p class="w-[110px] h-[25px]  text-center">{{$item->date}}</p>
                            </td>
                            <td class="px-4 py-4  text-center text-gray-900">
                                <p class="w-[70px] h-[25px]  text-center">{{$item->note}}</p>
                            </td>
                           
                            
                        </tr >
                        @endforeach
          
                    </tbody>
                    
                  </table>
                </div>
                <div class="c">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    
                        <tbody>
                   
                       
                            <tr  class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 " style="display: ">
                                <th scope="row" class=" px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                <p   class=" w-[150px] h-[25px]"></p>
                               
                                </th>
                                <td class="px-6 py-1 w-auto  text-center text-gray-900">
                                  <p class="w-[120px] h-[25px]"></p>
                                    
                                </td>
                                <td class="px-6 py-1   text-center text-gray-900">
                                 <p class="w-[70px] h-[25px]"></p>
                                  
                                </td>
                                <td class="px-6 py-1  text-center text-gray-900">
                                 <p class="w-[70px] h-[25px]"></p>
                                </td>
                                <td class="px-6 py-1  text-end text-gray-900">
                                   <p class="w-[70px] h-[25px] font-semibold">Sum Total</p>
                                </td>
                                <td class="px-6 py-1  text-end text-gray-900">
                                    <p id="SUM" class="w-[70px] h-[25px] font-semibold"></p>
                                  
                                </td>
                                <td class="px-6 py-1   text-center text-gray-900">
                                    
                                    <p class="w-[110px] h-[25px]"></p>
                                  
                                    
                                </td>
                                <td class="px-6 py-1  text-center text-gray-900">
                                  <p class="w-[70px] h-[25px] text-center"></p>
                                </td>
                                <td class="px-6 py-1  text-center text-gray-900">
                                  
                                </td>
                                
                            </tr>

                            <tr  class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 " style="display: ">
                                <th scope="row" class=" px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                <p   class=" w-[150px] h-[25px]"></p>
                               
                                </th>
                                <td class="px-6 py-1 w-auto  text-center text-gray-900">
                                  <p class="w-[120px] h-[25px]"></p>
                                    
                                </td>
                                <td class="px-6 py-1   text-center text-gray-900">
                                 <p class="w-[70px] h-[25px]"></p>
                                  
                                </td>
                                <td class="px-6 py-1  text-center text-gray-900">
                                 <p class="w-[70px] h-[25px]"></p>
                                </td>
                                <td class="px-6 py-1  text-end text-gray-900">
                                   <p  class="w-[70px] h-[25px] font-semibold">Vat 7%</p>
                                </td>
                                <td class="px-6 py-1  text-end text-gray-900">
                                    <p id="VAT" class="w-[70px] h-[25px] font-semibold"></p>
                                  
                                </td>
                                <td class="px-6 py-1   text-center text-gray-900">
                                    
                                    <p class="w-[110px] h-[25px]"></p>
                                  
                                    
                                </td>
                                <td class="px-6 py-1  text-center text-gray-900">
                                    <p class="w-[70px] h-[25px] text-center"></p>
                                </td>
                                <td class="px-6 py-1  text-center text-gray-900">
                                  
                                </td>
                                
                            </tr>

                            <tr  class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 " style="display: ">
                                <th scope="row" class=" px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                <p   class=" w-[150px] h-[25px]"></p>
                               
                                </th>
                                <td class="px-6 py-1 w-auto  text-center text-gray-900">
                                  <p class="w-[120px] h-[25px]"></p>
                                    
                                </td>
                                <td class="px-6 py-1   text-center text-gray-900">
                                 <p class="w-[70px] h-[25px]"></p>
                                  
                                </td>
                                <td class="px-6 py-1  text-center text-gray-900">
                                 <p class="w-[70px] h-[25px]"></p>
                                </td>
                                <td class="px-6 py-1  text-end text-gray-900">
                                   <p class="w-[70px] h-[25px] font-semibold whitespace-nowrap">Total Amount</p>
                                </td>
                                <td class="px-6 py-1  text-end text-gray-900 ">
                                    <p  id="TOTAL" class="w-[70px] h-[25px] font-semibold"></p>
                                  
                                </td>
                                <td class="px-6 py-1   text-center text-gray-900">
                                    
                                    <p class="w-[110px] h-[25px]"></p>
                                  
                                    
                                </td>
                                <td class="px-6 py-1  text-center text-gray-900">
                                    <p class="w-[70px] h-[25px] text-center"></p>
                                </td>
                                <td class="px-6 py-1  text-center text-gray-900">
                                  
                                </td>
                                
                            </tr>
                    </tbody>
                        
                      </table>
                    </div>                    
        </div>
        <div class="flex justify-center mt-3">
            <form action="{{route('confirmPO',$po->order_invoice)}}" method="POST">
                @csrf
                @method('PUT')
            @if($list->isEmpty())
            <button type="submit" class="min-w-[300px] min-h-[50px] rounded-xl bg-gray-500  text-white cursor-not-allowed" disabled >
                Confirm
            </button>       
            @else
            <button id="cf_po" type="submit" class="min-w-[300px] min-h-[50px] rounded-xl bg-gray-500 hover:bg-green-700 hover:ease-in-out duration-200 hover:scale-104 text-white" >
                Confirm
            </button>          
            @endif
        </form>
        </div>
        <a href="{{route('printPO',$po->order_invoice)}}"  target="_blank" class="w-[90px] h-[40px] border border-gray-300 bg-gray-500 rounded-sm mt-2 flex justify-center">  
            <i class="fa-solid fa-print mr-2 flex items-center"></i>
            <p class="flex items-center">Print</p>
        </a> 
        </div>
    </div>
   

 <script>
    
get_prlist("{{$po->phase}}")
get_po_detail({{$po->order_invoice}},1)
     
 </script>
@endsection
{{-- <h4 class="text-2xl flex items-center">
    <img src="{{url('/picture/logo.jpg')}}" alt="LOGO" class="w-[10%]" > &nbsp; TOACS (THAILAND) CO.,LTD.
</h4> 

<h4 class="text-2xl flex items-center">
    <small class="float-right" style="margin-top: 12px;">Create Date:
        20/09/2023 09:44:58</small>  
    </h4> --}}