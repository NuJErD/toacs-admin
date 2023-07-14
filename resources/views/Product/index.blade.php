@extends('layout.main')
@section('sidebar')
@include('layout.sidebarBack')
@endsection


@section('content')

<div class="main">
    <p class="text-[26px] font-bold mb-3">สินค้าและบริการ</p>
    <div class="main-prod">
        <div class="">
            <div class="card-pro border border-blue-500 px-4 ">
                <div class="header min-h-[50px] max-w-full text-white border border-red-500 flex justify-between bg-black bg-zinc-800 min-h-14 items-center px-6  flex-wrap">
                    <div class="">สินค้าแล้วบริการ</div>
                    <div class="btn flex justify-end flex-wrap  ">
                        <div class="add bg-blue-600  rounded-[4px] h-8 mr-1 flex items-center px-2"><i class="fa-solid fa-plus mr-1"></i>เพิ่ม</div>
                        <div class="import bg-green-800 rounded-[4px] mr-1 flex items-center px-2"><i class="fa-solid fa-file-arrow-up mr-1"></i>Excel Upload</div>
                        <div class="export bg-yellow-400 rounded-[4px] text-black flex items-center px-2"> <i class="fa-solid fa-file-export mr-1"></i>Export Product Excel</div>
                    </div>
                </div>
                <div class="cag border border-green-500">
                    <div class="cag flex justify-end my-2 mr-2">
                        <p class="mr-2">กรองสินค้าตามประเภท:</p>
                        <select class="border border-blue-400 rounded-[5px] w-[180px] ">
                            <option>a</option>
                            <option>b</option>
                            <option>c</option>
                        </select>
                        </div>
                    </div>
                <div class="card-body border border-yellow-500 px-3 py-4">
                    <form action="" class="">
                    <div class="im-excel bg-blue-50 flex justify-center py-[25px] min-h-[100px]">
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
                    <div class="list-prod ">
                        <div class="show">
                            <div class="showprod"></div>
                            <div class="search">Search: <input type="text" class="border border-slate-300"></div>
                        </div>
                        <div class=""></div>
                        <div class=""></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection