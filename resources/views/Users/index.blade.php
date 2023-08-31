

@extends('layout.main')
@section('sidebar')
@include('layout.sidebarBack')
@endsection


@section('content')

<div class="main">
    <p class="text-[26px] font-bold mb-3 ">ผู้ใช้งาน</p>
    <div class="main-prod">
        <div class="">
            <div class="card-pro px-4 ">
                <div class="header min-h-[50px] max-w-full text-white rounded-t-[5px]  flex justify-between  bg-zinc-800 min-h-14 items-center px-6  flex-wrap">
                    <div class="">ผู้ใช้งาน</div>
                    <div class="btn flex justify-end flex-wrap  ">
                        <a href="{{url('adduser')}}"><div class="add bg-blue-600  rounded-[4px] h-8 mr-1 flex items-center px-2"><i class="fa-solid fa-plus mr-1"></i>เพิ่ม</div></a>
                        <button onclick="openimport()" class="import bg-green-800 rounded-[4px] mr-1 flex items-center px-2">
                            <div><i class="fa-solid fa-file-arrow-up mr-1" ></i>Excel Upload</div>
                        </button>
                        <div class="export bg-yellow-400 rounded-[4px] text-black flex items-center px-2"> <i class="fa-solid fa-file-export mr-1"></i>Export Product Excel</div>
                    </div>
                </div>
                <div class="card-body border px-3 py-4">
                    <form action="{{route('import')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div id="importbtn" class="im-excel bg-blue-50 flex justify-center py-[25px] min-h-[100px] flex-wrap" style="display: none" >
                        <div class="text flex items-center">
                            <p class="text-[18px] font-bold">Excel<p class="text-red-500 text-[18px] ml-1">*</p></p>
                        </div>
               
                        <div class="upfile w-[500px] border bg-white border-slate-300 min-h-[45px] flex items-center rounded-[5px]" >
                            
                            <input class="ml-3" type="file" name="file">
                        </div>
                        <div class="btn flex flex-col justify-center ml-2  w-[100px]">
                            
                            <button type="submit" class="w-[120px] flex justify-center items-center h-[30px] bg-zinc-800 text-white rounded-[3px]"><i class="fa-solid fa-file-arrow-up mr-1 flex items-center"></i>Upload File</button></div>
                    </div>
                </form>
                    <div class="list-prod ">
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
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                ชื่อ - นามสกุล
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                               อีเมล
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                               Requester
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Approved
                                            </th>
                                            <th scope="col" class="px-6 py-3 flex items-center justify-center ">
                                                <p class="">Manage</p>
                                            </th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($userall as $u)
                                            
                                        
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                               {{$u->nameTH}}
                                            </th>
                                            <td class="px-6 py-4 ">
                                               {{$u->email}}
                                            </td>
                                            <td class="px-6 py-4">
                                                @if($u->statusR == 'Y')
                                                <i class="fa-solid fa-check text-green-500 text-[17px]"></i>
                                                @else
                                                <i class="fa-solid fa-x text-red-600 text-[17px]"></i>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4">
                                                @if($u->statusA == 'Y')
                                                <i class="fa-solid fa-check text-green-500 text-[17px]"></i>
                                                @else
                                                <i class="fa-solid fa-x text-red-600 text-[17px]"></i>
                                                @endif
                                            </td>
                                            <td class="">
                                                <div class="flex justify-center">
                                                <div class=" ">
                                                <a href="{{route('user.edit',$u->id)}}" class="font-medium text-white dark:text-blue-500 hover:cursor-pointer mr-3 w-[60px] flex items-center justify-center bg-blue-600 h-[30px] rounded-[4px]">แก้ไข</a>
                                            </div>
                                            <div class="">
                                                <a href="#" class="font-medium text-white dark:text-red-500 hover:cursor-pointer w-[60px] flex items-center justify-center bg-red-600 h-[30px] rounded-[4px]">ลบ</a>
                                            </div>
                                        </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                       
                                    </tbody>
                                </table>
                                {{ $userall->links() }}
                            </div>
                        </div>
                        <div class=""></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection