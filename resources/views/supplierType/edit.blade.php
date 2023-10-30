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
                    <div class="">แก้ไขประเภทซัพพลายเออร์</div>
                    <div class="btn flex justify-end flex-wrap  ">
                        <div class="add bg-blue-600  rounded-[4px] h-8 mr-1 flex items-center px-2">ย้อนกลับ</div>
                        
                    </div>
                </div>
                <div class="card-body borderpx-3 pt-4 pb-10 flex shadow-lg ">
                    
                    <div class="wrapped mx-auto">
                        <form action="{{route('supplierType.update',$sup->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        <div class=" px-[10px] ">
                           
                            <div class="flex flex-wrap justify-between mt-6">                               
                                <div class="min-w-[140px] flex justify-end items-center"><p>ประเภทซัพพลายเออร์ (TH)</p></div>                                                                  
                                    <input name="SPTnameTH" value="{{$sup->SPTnameTH}}" type="text" placeholder="ประเภทซัพพลายเออร์(TH)" class="w-[450px] pl-3  ml-6 h-[35px] border border-gray-300 rounded-[5px]" required >                                                                                      
                            </div>
                            <div class="flex flex-wrap justify-between mt-6">
                                <div class="min-w-[140px] flex justify-end items-center"><p>ประเภทซัพพลายเออร์ (EN)</p></div>
                                <div class=""><input name="SPTnameEN" value="{{$sup->SPTnameEN}}" type="text" placeholder="ประเภทซัพพลายเออร์(EN)" class="pl-3 w-[450px] ml-6 h-[35px] border border-gray-300 rounded-[5px]" required></div>
                            </div>
                        </div>
                
                            <div class="flex flex-wrap justify-between mt-6">
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