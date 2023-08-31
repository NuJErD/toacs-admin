@extends('layout.main')
@section('sidebar')
@include('layout.sidebarBack')
@endsection


@section('content')

<div class="main">
    <p class="text-[26px] font-bold mb-3">สินค้าและบริการ</p>
    <div class="main-prod">
        <div class="">
            <div class="card-pro px-4 flex flex-col  mb-3 ">
                <div class="header min-h-[50px] rounded-t-[4px] max-w-full text-white border flex justify-between bg-zinc-700 min-h-14 items-center px-6  flex-wrap">
                    <div class="">แก้ไขข้อมูลผู้ใช้งาน</div>
                    <div class="btn flex justify-end flex-wrap  ">
                        <div class="add bg-blue-600  rounded-[4px] h-8 mr-1 flex items-center px-2">ย้อนกลับ</div>
                        
                    </div>
                </div>
                <div class="card-body borderpx-3 pt-4 pb-10 flex shadow-lg ">
                    
                    <div class="wrapped mx-auto">
                        <form action="{{route('user.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                        <div class=" px-[10px] ">
                            <div class="flex flex-wrap justify-between mt-6">                               
                                <div class="w-[130px] flex justify-end"><p>ชื่อ-สกุล(TH)</p></div>                                                                  
                                    <input name="nameTH" value="{{$user->nameTH}}" type="text" placeholder="ชื่อ-สกุล(TH)" class="w-[450px] pl-3  ml-6 h-[35px] border border-gray-300 rounded-[5px]" required >                                                                                      
                        </div>
                            <div class="flex flex-wrap justify-between mt-6">
                                <div class="w-[130px] flex justify-end"><p>ชื่อ-สกุล(EN)</p></div>
                                <div class=""><input name="nameEN" value="{{$user->nameEN}}" type="text" placeholder="ชื่อ-สกุล(EN)" class="pl-3 w-[450px] ml-6 h-[35px] border border-gray-300 rounded-[5px]" required></div>
                            </div>
                            <div class="flex flex-wrap justify-between mt-6">
                                <div class="w-[130px] flex justify-end"><p>เบอร์โทรศัพท์</p></div>
                                <div class=""><input name="phone" value="{{$user->phone}}" type="text" placeholder="เบอร์โทรศัพท์" class="pl-3 w-[450px] ml-6 h-[35px] border border-gray-300 rounded-[5px]" required></div>
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