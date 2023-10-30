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
                    
                        <td style="vertical-align: top;" class=" whitespace-pre-line">{{$sup->address}}700/65 หมู่ 6 ตำบลคลองตำหรุ อำเภอเมือง จังหวัดชลบุรี 20000
                            โทร: (038) 213289-91 แฟ็กซ์ : (038)213507}</td>
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
                        <th scope="col" class="px-6 py-3 w-auto text-center">
                            Productname
                        </th>
                        <th scope="col" class="px-6 py-3 w-auto text-center">
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
                        <th scope="col" class="px-6 py-3  w-auto  text-center">
                            receive
                            {{-- <i class="fa-solid fa-plus fa-2xl" style="color: #04b907;"></i> --}}
                        </th>
                    </tr>
                </thead>
                <tbody>
                   
                    <tbody id="POlist">
                      
                </tbody>
                
              </table>
            </div>
            
            <div class="b">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                
                   
                           
                            
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
            <form action="{{route('ReceiveStatus',$po->id)}}" method="POST">
                @csrf
                @method('PUT')
                
            <button type="submit" id="receivedBTN" class="min-w-[300px] min-h-[50px] rounded-xl bg-gray-500   text-white cursor-not-allowed" disabled>
                Confirm
            </button>
        
        </form>
        </div>
        </div>
    </div>
    <a href="{{route('printPO',$po->order_invoice)}}"  target="_blank" class="w-[90px] h-[40px] border border-gray-300 bg-gray-100 rounded-sm mt-2 flex justify-center">  
        <i class="fa-solid fa-print mr-2 flex items-center"></i>
        <p class="flex items-center">Print</p>
    </a> 

 <script>
  
     get_po_detail({{$po->order_invoice}},0)
    // HideTrash()
    
 </script>
@endsection
{{-- <h4 class="text-2xl flex items-center">
    <img src="{{url('/picture/logo.jpg')}}" alt="LOGO" class="w-[10%]" > &nbsp; TOACS (THAILAND) CO.,LTD.
</h4> 

<h4 class="text-2xl flex items-center">
    <small class="float-right" style="margin-top: 12px;">Create Date:
        20/09/2023 09:44:58</small>  
    </h4> --}}