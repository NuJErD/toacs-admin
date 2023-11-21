@extends('layout.main')
@section('sidebar')
@include('layout.sidebarBack')
@endsection


@section('content')

<div class="main">
    <div class="main-prod pt-10">
        <div class="">
            <div class="card-pro px-4 flex flex-col  mb-3 ">
                <div class="header min-h-[50px] rounded-t-[4px] max-w-full text-white border flex justify-between bg-zinc-700 min-h-14 items-center px-6  flex-wrap">
                    <div class="">เพิ่มหมวดสินค้า</div>
                    <div class="btn flex justify-end flex-wrap  ">
                        <div class="add bg-blue-600  rounded-[4px] h-8 mr-1 flex items-center px-2" onclick="goBack()"><button>ย้อนกลับ</button></div>
                        
                    </div>
                </div>
                <div class="card-body borderpx-3 pt-4 pb-10 flex shadow-lg ">
                    
                    <div class="wrapped mx-auto">
                        <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class=" px-[10px] ">
                            <div class="flex flex-wrap justify-between mt-6">                               
                                <div class="w-[130px] flex justify-end"><p>รหัส</p></div>  
                                <div class="">                                                                
                                    <input name="code" type="text" placeholder="รหัส" class=" valid:border-green-500 peer w-[450px] pl-3  ml-6 h-[35px] border border-gray-300 rounded-[5px]" required >
                                    <p class="invisible peer-invalid:visible text-red-600 font-light ml-6 text-[14px]">*กรอกข้อมูล</p>
                                </div>
                            </div>
                            <div class="flex flex-wrap justify-between mt-4">                               
                                <div class="w-[130px] flex justify-end"><p>ชื่อหมวดหมู่(TH)</p></div>  
                                <div class="">                                                                
                                    <input name="CnameTH" type="text" placeholder="ชื่อหมวดหมู่" class=" valid:border-green-500 peer w-[450px] pl-3  ml-6 h-[35px] border border-gray-300 rounded-[5px]" required >                                                                                      
                                    <p class="invisible peer-invalid:visible text-red-600 font-light ml-6 text-[14px]">*กรอกข้อมูล</p>
                                </div>
                            </div>
                            <div class="flex flex-wrap justify-between mt-4">
                                <div class="w-[130px] flex justify-end"><p>ชื่อหมวดหมู่(EN)</p></div>
                                <div class=""><input name="CnameEN" type="text" placeholder="ชื่อหมวดหมู่(EN)" class=" valid:border-green-500 peer pl-3 w-[450px] ml-6 h-[35px] border border-gray-300 rounded-[5px]" required>
                                    <p class="invisible peer-invalid:visible text-red-600 font-light ml-6 text-[14px]">*กรอกข้อมูล</p>
                                </div>
                            </div>
                        </div>
                
                            <div class="flex flex-wrap justify-between mt-4">
                                <div class="w-[130px] flex justify-end"></div>
                                <div class=" w-[450px] "><button type="submit" class=" bg-zinc-800 w-[100px] h-[40px] rounded-[5px]" ><p class="text-white">บันทึก</p></button></div>                   
                            </div>
                        </div>
                    </form>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
</div>

@endsection