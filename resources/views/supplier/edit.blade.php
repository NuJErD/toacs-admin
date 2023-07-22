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
                    <div class="">เพิ่มสินค้า</div>
                    <div class="btn flex justify-end flex-wrap  ">
                        <div class="add bg-blue-600  rounded-[4px] h-8 mr-1 flex items-center px-2" onclick="goBack()"><button>ย้อนกลับ</button></div>
                        
                    </div>
                </div>
                <div class="card-body borderpx-3 pt-4 pb-10 flex shadow-lg ">
                    
                    <div class="wrapped mx-auto">
                        <form action="{{route('supplier.update',$sup->id)}}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                        <div class=" px-[10px] ">
                           
                            <div class="flex flex-wrap justify-between mt-6">                               
                                <div class="w-[140px] flex justify-end items-center"><p>รหัส</p></div>                                                                  
                                    <input name="code" value="{{$sup->code}}" type="text" placeholder="รหัส" class="w-[450px] pl-3  ml-6 h-[35px] border border-gray-300 rounded-[5px]" required >                                                                                      
                            </div>

                            <div class="flex flex-wrap justify-between mt-6">
                                <div class="w-[140px] flex justify-end items-center"><p>ชื่อ-สกุล</p></div>                                
                                    <input name="name" type="text" value="{{$sup->name}}" placeholder="ชื่อ-สกุล" class="pl-3 w-[450px] ml-6 h-[35px] border border-gray-300 rounded-[5px]" required>
                            </div>

                            <div class="flex flex-wrap justify-between mt-6">
                                    <div class="w-[140px] flex justify-end items-center"><p>ซัพพลายเออร์(TH)</p></div>                                
                                        <input name="SPnameTH" value="{{$sup->SPnameTH}}" type="text" placeholder="ซัพพลายเออร์(TH)" class="pl-3 w-[450px] ml-6 h-[35px] border border-gray-300 rounded-[5px]" required>
                            </div>

                            <div class="flex flex-wrap justify-between mt-6">
                                <div class="w-[140px] flex justify-end items-center"><p>ซัพพลายเออร์(EN)</p></div>                                
                                    <input name="SPnameEN" value="{{$sup->SPnameEN}}" type="text" placeholder="ซัพพลายเออร์(EN)" class="pl-3 w-[450px] ml-6 h-[35px] border border-gray-300 rounded-[5px]" required>
                            </div>

                            <div class="flex flex-wrap justify-between mt-6">
                                    <div class="w-[140px] flex justify-end items-center"><p>เบอร์โทรศัพท์</p></div>                                
                                        <input name="phone" value="{{$sup->phone}}" type="text" placeholder="เบอร์โทรศัพท์" class="pl-3 w-[450px] ml-6 h-[35px] border border-gray-300 rounded-[5px]" required>
                            </div> 

                            <div class="flex flex-wrap justify-between mt-6">
                                        <div class="w-[140px] flex justify-end items-center"><p>ที่อยู่</p></div>                                
                                            <textarea  name="address" type="text"  class="pl-3 w-[450px] ml-6 h-[100px] border border-gray-300 rounded-[5px]" required>{{$sup->address}}</textarea>
                            </div> 
                                
                            <div class="flex flex-wrap justify-between mt-6">
                                            <div class="w-[140px] flex justify-end items-center"><p>เครดิต</p></div>                                
                                                
                                            <input name="credit" value="{{$sup->credit}}" type="text" placeholder="เครดิต" class="pl-3 w-[450px] ml-6 h-[35px] border border-gray-300 rounded-[5px]" required>
                            </div> 

                            <div class="flex flex-wrap justify-between mt-6">
                                <div class="w-[140px] flex justify-end items-center"><p>อีเมล</p></div> 
                                                               
                                    <input name="email" value="{{$sup->email}}" type="email" placeholder="อีเมล" class="pl-3 w-[450px] ml-6 h-[35px] border border-gray-300 rounded-[5px]" required>
                            </div>
                                            
                            <div class="flex flex-wrap justify-between mt-6">
                                                <div class="w-[150px] flex justify-end items-center"><p>ประเภทซัพพลายเออร์</p></div>                                
                                                <div class="w-[450px] ml-6 h-[35px] ">
                                                    <select name="SPtype" data-te-select-init   required>
                                                    <option selected value="{{$sup->id}}">{{$supType_use->SPTnameTH}}</option>
                                                      @foreach($supType as $sup)
                                                       <option value="{{$sup->id}}">{{$sup->SPTnameTH}}</option>
                                                       @endforeach
                                                       
                                                      </select>
                                                      <label data-te-select-label-ref>ซัพพลายเออร์</label>
                                                </div>  
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