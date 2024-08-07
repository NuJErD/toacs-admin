@extends('layout.main')
@section('sidebar')
@include('layout.sidebarBack')
@endsection


@section('content')
<?php use Carbon\Carbon;    
 
  ?>
<div class="main">
 
    <div class="main-prod pt-10">
        <div class="">
            <div class="card-pro px-4 ">
                <div class="header min-h-[50px] max-w-full text-white rounded-t-[5px]  flex justify-between  bg-zinc-800 min-h-14 items-center px-6  flex-wrap">
                    <div class="">ประวัติคำสั่งซื้อ</div>
                  
                </div>
                <div class="card-body border px-3 py-4">
                    <form action="" class="">
                    <div id="importbtn" class="im-excel bg-blue-50 flex justify-center py-[25px] min-h-[100px] flex-wrap" style="display: none" >
                        <div class="text flex items-center">
                            <p class="text-[18px] font-bold">Excel<p class="text-red-500 text-[18px] ml-1">*</p></p>
                        </div>
               
                        <div class="upfile w-[500px] border bg-white border-slate-300 min-h-[45px] flex items-center rounded-[5px]" >
                            
                            <input class="ml-3" type="file">
                        </div>
                        <div class="btn flex flex-col justify-center ml-2  w-[100px]">
                            
                            <button type="submit" class="w-[120px] flex justify-center items-center h-[30px] bg-zinc-800 text-white rounded-[3px]"><i class="fa-solid fa-file-arrow-up mr-1 flex items-center"></i>Upload File</button></div>
                    </div>
                </form>
                    <div class="">
                        <div class=" ">
                        <form class="flex" method="POST" action="/export/po" >
                            <script>
                              function setdate() {
                                    var today =  document.getElementById('startDate').value;
                                    document.getElementById('endDate').value = '';
                                    document.getElementById("endDate").setAttribute("min", today);
                                };
                            </script>
                            @csrf
                            Export :   
                            <input id='startDate' type="date" class="ml-2 mr-2 pl-2 border border-slate-300 rounded-[5px] min-w-[35px]"  name = "start" onchange="setdate()" required> To
                            <input id="endDate" type="date" class="ml-2 mr-2 pl-2 border border-slate-300 rounded-[5px] min-w-[35px]"  name = "end" required>
                            <div class="w-[70px] border border-black  rounded-md flex justify-center "><button type="submit" class="" >Export</button></div>   
                            
                        </form>
                        </div>
                        <br>
                        <div class="show flex justify-between mt-3">
                            
                            <div class="showprod flex ">
                                <p class=" mr-1 mt">Show</p>
                                <select class="border border-slate-300 rounded-[5px] w-28">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                </select>
                                <p class=" ml-1">entries</p>
                            </div>
                            <div class="search">Search: <input type="text" class="border border-slate-300 rounded-[5px]"></div>
                        </div>
                        <div class=" mt-3">
                            <div class=" overflow-x-auto  shadow-md sm:rounded-lg">
                                <table class="w-full text-sm text-left text-black dark:text-gray-400">
                                    <thead class="text-xs text-black uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            
                                            <th scope="col" class="px-6 py-3">
                                              <p class="flex justify-center">รหัสใบสั่งซื้อ</p>
                                            </th>
                                            
                                            <th scope="col" class="px-6 py-3">
                                                <p class="flex justify-center">ราคา </p>
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                <p class="flex justify-center"> วันที่สร้าง</p>
                                              </th>
                                              <th scope="col" class="px-6 py-3">
                                                <p class="flex justify-center"> วันที่ตรวจรับสินค้า</p>
                                              </th>
                                              
                                             
                                           
                                            <th scope="col" class="px-6 py-3 flex items-center justify-center ">
                                                <p class="">Manage</p>
                                            </th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach ($POhis as $pos) 
                                            
                                        
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            
                                           
                                            <td class="px-6 py-4">
                                               <p class="flex justify-center">{{$pos->order_invoice}}</p>
                                            </td>
                                            
                                             <td class="px-6 py-4">
                                                <p class="flex justify-center">{{$pos->total}}</p>
                                             </td>
                                            <td class="px-6 py-4">
                                                <p class="flex justify-center"><?php $formattedDate = Carbon::parse($pos->create_date)->format('d-m-Y H:i:s'); ?>{{$formattedDate}}</p>
                                            </td>
                                            <td class="px-6 py-4">
                                                <p class="flex justify-center"><?php $formattedDate = Carbon::parse($pos->update_date)->format('d-m-Y H:i:s'); ?>{{$formattedDate}}</p>
                                            </td>
                                            <td class="">
                                                <div class="flex justify-center">
                                                <div class=" ">
                                                {{-- <a href="{{route('supplier.edit', $sp->id)}}" class="font-medium text-white dark:text-blue-500 hover:cursor-pointer mr-3 w-[60px] flex items-center justify-center bg-blue-600 h-[30px] rounded-[4px]">แก้ไข</a>
                                            </div> --}}
                                           
                                            <div class="flex">
                                                
                                                <a href="#" class="font-medium text-white dark:text-red-500 hover:cursor-pointer w-[100px] flex items-center justify-center bg-blue-500 h-[30px] rounded-[4px]">รายละเอียด</a>
                                            </div>
                                        </div>
                                            </td>
                                        </tr>
                                        <tr>
                                          {{-- <td class="border border-red-600 " colspan="4"></td> --}}
                                        </tr>
                                        @endforeach
                                       
                                    </tbody>
                                  
                                </table>
                                {{ $POhis->links() }}
                          
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection