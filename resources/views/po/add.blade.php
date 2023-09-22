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
                    <b>บริษัท โทแอคส์ (ประเทศไทย) จำกัด</b>
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
                        20/09/2023 09:44:58</small>  
                        <button class="bg-white border" onclick="GetProductDetail()">test</button>
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
                        <td><b>Address</b></td>
                        <td>:</td>
                        <td>{{$sup->address}}</td>
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
                        <th scope="col" class="px-6 py-3" onclick="PoAdd()">
                            <i class="fa-solid fa-plus fa-2xl" style="color: #04b907;"></i>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <div class="" >
                        <tr id="POadd" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 " style="display: ">
                            <th scope="row" class=" px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-blue-200 text-center">
                             <select id="PRNO" class=" w-[150px] h-[25px]" onchange=" getproduct()">
                             
                             </select>
                            </th>
                            <td class="px-6 py-4 w-auto bg-blue-200 text-center text-gray-900">
                                <select id="product-po"  class="w-[120px] h-[25px]">
                                   
                                 </select>
                                 
                            </td>
                            <td class="px-6 py-4  bg-blue-200 text-center text-gray-900">
                              <input id="QTY" name="QYT" class="w-[70px] h-[25px] text-center"  type="text" >
                            </td>
                            <td class="px-6 py-4 bg-blue-200 text-center text-gray-900">
                              <input id="unit" name="unit" class="w-[70px] h-[25px] text-center" readonly>
                            </td>
                            <td class="px-6 py-4 bg-blue-200 text-center text-gray-900">
                                <input id="price" name="price" class="w-[70px] h-[25px] text-center text-gray-900" readonly>
                            </td>
                            <td class="px-6 py-4 bg-blue-200 text-center text-gray-900">
                                <input id="totalprice" name="totalprice" class="w-[70px] h-[25px] text-center" readonly>
                            </td>
                            <td class="px-6 py-4 bg-blue-200  text-center text-gray-900">
                                <input id="expected_date" name="expected_date" class="w-[110px] h-[25px] text-center" readonly>
                            </td>
                            <td class="px-6 py-4 bg-blue-200 text-center text-gray-900">
                                <input name="note" class="w-[70px] h-[25px] text-center">
                            </td>
                            <td class="px-6 py-4 bg-blue-200 text-center text-gray-900">
                                <i class="fa-solid fa-plus fa-xl" style="color: #04b907;"></i>
                            </td>
                            
                        </tr>
                    </div>
                   
                    <div class="" id="POlist">
                        <tr  class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" >
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                               PR.20230922
                            </th>
                            <td class="px-6 py-4  text-center">
                                Silver
                            </td>
                            <td class="px-6 py-4 text-center">
                                Laptop
                            </td>
                            <td class="px-6 py-4 text-center">
                                $2999
                            </td>
                            <td class="px-6 py-4 text-center">
                                $2999
                            </td>
                            <td class="px-6 py-4 text-center">
                                $2999
                            </td>
                            <td class="px-6 py-4 text-center">
                                $2999
                            </td>
                            <td class="px-6 py-4 text-center">
                                $2999
                            </td>
                        </tr>
                    </div>
                </tbody>
            </table>
        </div>
        </div>
    </div>

 <script>
     get_prlist()
    
 </script>
@endsection
{{-- <h4 class="text-2xl flex items-center">
    <img src="{{url('/picture/logo.jpg')}}" alt="LOGO" class="w-[10%]" > &nbsp; TOACS (THAILAND) CO.,LTD.
</h4> 

<h4 class="text-2xl flex items-center">
    <small class="float-right" style="margin-top: 12px;">Create Date:
        20/09/2023 09:44:58</small>  
    </h4> --}}