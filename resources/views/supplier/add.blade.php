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
                        <div class="add bg-blue-600  rounded-[4px] h-8 mr-1 flex items-center px-2" onclick="goBack()"><button> ย้อนกลับ</button></div>
                        
                    </div>
                </div>
                <div class="card-body borderpx-3 pt-4 pb-10 flex shadow-lg ">
                    
                    <div class="wrapped mx-auto">
                        <form action="{{route('supplier.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class=" px-[10px] ">
                           
                            <div class="flex flex-wrap justify-between mt-6">                               
                                <div class="w-[140px] flex justify-end "><p>รหัส</p></div>  
                                <div class="">                                                                
                                    <input name="code" type="text" placeholder="รหัส" class=" peer valid:border-green-500 w-[450px] pl-3  ml-6 h-[35px] border border-gray-300 rounded-[5px]" oninput="this.value = this.value.toUpperCase()" required >
                                    <p class="invisible peer-invalid:visible text-red-600 font-light ml-6 text-[14px]">*กรอกข้อมูล</p>
                                </div>
                            </div>

                            <div class="flex flex-wrap justify-between mt-6">
                                <div class="w-[140px] flex justify-end "><p>ชื่อ-สกุล</p></div>                                
                                    <div class=""><input name="name" type="text" placeholder="ชื่อ-สกุล" class=" peer valid:border-green-500 pl-3 w-[450px] ml-6 h-[35px] border border-gray-300 rounded-[5px]" required>
                                    <p class="invisible peer-invalid:visible text-red-600 font-light ml-6 text-[14px]">*กรอกข้อมูล</p></div>
                            </div>

                            <div class="flex flex-wrap justify-between mt-6">
                                    <div class="w-[140px] flex justify-end "><p>ซัพพลายเออร์(TH)</p></div>
                                    <div class="">                               
                                        <input name="SPnameTH" type="text" placeholder="ซัพพลายเออร์(TH)" class=" peer valid:border-green-500 pl-3 w-[450px] ml-6 h-[35px] border border-gray-300 rounded-[5px]" required>
                                        <p class="invisible peer-invalid:visible text-red-600 font-light ml-6 text-[14px]">*กรอกข้อมูล</p>
                                    </div>
                            </div>

                            <div class="flex flex-wrap justify-between mt-6">
                                <div class="w-[140px] flex justify-end "><p>ซัพพลายเออร์(EN)</p></div>  
                                <div class="">                              
                                    <input name="SPnameEN" type="text" placeholder="ซัพพลายเออร์(EN)" class="peer valid:border-green-500 pl-3 w-[450px] ml-6 h-[35px] border border-gray-300 rounded-[5px]" required>
                                    <p class="invisible peer-invalid:visible text-red-600 font-light ml-6 text-[14px]">*กรอกข้อมูล</p>
                                </div>
                            </div>

                            <div class="flex flex-wrap justify-between mt-6">
                                    <div class="w-[140px] flex justify-end "><p>เบอร์โทรศัพท์</p></div> 
                                    <div class="">                              
                                        <input name="phone" type="text" placeholder="เบอร์โทรศัพท์" class="peer valid:border-green-500 pl-3 w-[450px] ml-6 h-[35px] border border-gray-300 rounded-[5px]" required>
                                        <p class="invisible peer-invalid:visible text-red-600 font-light ml-6 text-[14px]">*กรอกข้อมูล</p>
                                        </div>
                                    </div>
                            </div> 

                            <div class="flex flex-wrap justify-between mt-6">
                                        <div class="w-[140px] flex justify-end items-center"><p>ที่อยู่</p></div>                                
                                            <textarea name="address" type="text"  class="pl-3 w-[450px] ml-6 h-[100px] border border-gray-300 rounded-[5px]" required></textarea>
                            </div> 
                                
                            <div class="flex flex-wrap justify-between mt-6">
                                            <div class="w-[140px] flex justify-end "><p>เครดิต</p></div> 
                                                <div class="">                             
                                                <input name="credit" type="text" placeholder="เครดิต" class="peer valid:border-green-500 pl-3 w-[450px] ml-6 h-[35px] border border-gray-300 rounded-[5px]" required>
                                                <p class="invisible peer-invalid:visible text-red-600 font-light ml-6 text-[14px]">*กรอกข้อมูล</p>
                                                </div>
                            </div> 
                                            
                            <div class="flex flex-wrap justify-between mt-6">
                                                <div class="w-[150px] flex justify-end "><p>ประเภทซัพพลายเออร์</p></div>                                
                                                <div class="w-[450px] ml-6 h-[35px] ">
                                                    <select name="SPtype" data-te-select-init   required>
                                                    <option></option>
                                                      @foreach($supType as $sup)
                                                       <option value="{{$sup->id}}">{{$sup->SPTnameTH}}</option>
                                                       @endforeach
                                                       
                                                      </select>
                                                      <label data-te-select-label-ref>ซัพพลายเออร์</label>
                                                </div>  
                            </div>
                            
                            <div class="flex flex-wrap justify-between mt-6">
                                <div class="w-[140px] flex justify-end "><p>อีเมล</p></div>
                                <div class="">                               
                                    <input name="email" type="email" placeholder="อีเมล" class="peer valid:border-green-500 pl-3 w-[450px] ml-6 h-[35px] border border-gray-300 rounded-[5px]" required>
                                    <p class="invisible peer-invalid:visible text-red-600 font-light ml-6 text-[14px]">*กรอกข้อมูล</p>
                                </div>
                            </div> 
                            <div class="flex flex-wrap justify-between mt-6">
                                <div class="w-[130px] flex justify-end"></div>
                                <div class=" w-[450px] "><button type="submit" class=" bg-zinc-800 w-[100px] h-[40px] rounded-[5px]" ><p class="text-white">บันทึก</p></button></div>                   
                            </div>
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