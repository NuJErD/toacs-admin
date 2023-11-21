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
                        <div class="add bg-blue-600  rounded-[4px] h-8 mr-1 flex items-center px-2" onclick="goBack()"><button>ย้อนกลับ</button> </div>
                        
                    </div>
                </div>
                <div class="card-body borderpx-3 pt-4 pb-10 flex shadow-lg ">
                    
                    <div class="wrapped mx-auto">
                        <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class=" px-[10px] ">
                            <div class="flex flex-wrap justify-center mt-6">
                                
                                <div class="">
                                    <div class="border border-gray-300 w-[450px] h-[160px]">
                                        <img id="blah" src="" class="">
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-wrap justify-between mt-6">
                                <div class="w-[130px] flex justify-end"><p>รูปภาพสินค้า</p></div>
                                <div class=""><input name="productpic" type="file" class="peer pl-3 w-[450px] ml-6 h-[35px]" onchange="readURL(this)" required>
                                    <p class="invisible peer-invalid:visible text-red-600 font-light ml-6 text-[14px]">*เลือกรูปภาพ</p>
                                </div>
                            </div>

                            <div class="flex flex-wrap justify-between mt-6">
                                <div class="w-[130px] flex justify-end"><label for="code"><span>รหัสสินค้า</span></div>
                                <div class=""><input id='code'name="code" type="text" placeholder="รหัสสินค้า" class=" valid:border-green-500 peer pl-3 w-[450px] ml-6 h-[35px] border border-gray-300 rounded-[5px]" onkeyup="checkinput({{$productcode}},this.value)" oninput="this.value = this.value.toUpperCase()" required>
                                   <p id='codecheck' class="invisible peer-invalid:visible text-red-600 font-light ml-6 text-[14px]">*กรอกข้อมูล</p>
                                   <p id="codealert" class="ml-6 text-red-600" style="display: none">*รหัสสินค้าซ้ำ</p>
                                </div>                          
                            </label>
                            </div>

                                                       
                            

                            <div class="flex flex-wrap justify-between mt-6">                               
                                <div class="w-[130px] flex justify-end"><p>ชื่อสินค้า(TH)</p></div>
                                <div class="">                                                                 
                                    <input id="PnameTH" name="PnameTH" type="text" placeholder="ชื่อสินค้า" class=" valid:border-green-500 peer w-[450px] pl-3  ml-6 h-[35px] border border-gray-300 rounded-[5px]" required >                                                                                      
                                    <p class="invisible peer-invalid:visible text-red-600 font-light ml-6 text-[14px]">*กรอกข้อมูล</p>
                                </div> 
                        </div>

                            <div class="flex flex-wrap justify-between mt-6">
                                <div class="w-[130px] flex justify-end"><p>ชื่อสินค้า(EN)</p></div>
                                <div class="">
                                    <input id="PnameEN" name="PnameEN" type="text" placeholder="ชื่อสินค้า(EN)" class=" valid:border-green-500 peer pl-3 w-[450px] ml-6 h-[35px] border border-gray-300 rounded-[5px]" required>
                                    <p class="invisible peer-invalid:visible text-red-600 font-light ml-6 text-[14px]">*กรอกข้อมูล</p>
                                </div>
                            </div>

                            <div class="flex flex-wrap justify-between mt-6 z-0">
                                <div class="w-[130px] flex justify-end"><p>สังกัดหน่อยงาน</p></div>
                                <div class="w-[450px] ml-6 h-[35px] border-green-500 " >
                                    <select name="department[]" class="focus:border-green-500" data-te-select-init multiple  required>
                                        @foreach ($department as $de)
                                        <option class="focus:border-green-500" value="{{$de->id}}">{{$de->departTH}}</option>
                                        @endforeach
                                       
                                       
                                      </select>
                                      <label data-te-select-label-ref>หน่วยงาน</label>
                                     
                                </div>  
                            </div>
                            <div class="flex flex-wrap justify-between mt-6 z-0">
                                <div class="w-[130px] flex justify-end"><p>หมวดสินค้า</p></div>
                                <div class="w-[450px] ml-6 h-[35px] focus:border-green-500">
                                    <select name="category" data-te-select-init required>
                                        <option ></option>
                                        @foreach ($categories as $c) 
                                       <option value="{{$c->code}}">{{$c->CnameTH}}</option>                                                                                                               
                                       @endforeach
                                      </select>
                                      <label data-te-select-label-ref>หมวดสินค้า</label>
                                </div>  
                            </div>

                            <div class="flex flex-wrap justify-between mt-6">
                                <div class="w-[130px] flex justify-end"><p>ราคา</p></div>
                                <div class=""><input name="price" type="number" placeholder="ราคา" class=" valid:border-green-500 peer pl-3 w-[450px] ml-6 h-[35px] border border-gray-300 rounded-[5px]" required>
                                <p class="invisible peer-invalid:visible text-red-600 font-light ml-6 text-[14px]">*กรอกข้อมูล</p>
                                </div>
                            </div>

                            <div class="flex flex-wrap justify-between mt-6">
                                <div class="w-[130px] flex justify-end"><p>หน่วย</p></div>
                                <div class="">
                                    <input name="unit" type="text" placeholder="หน่วย" class=" valid:border-green-500 peer pl-3 w-[450px] ml-6 h-[35px] border border-gray-300 rounded-[5px]" required>
                                    <p class="invisible peer-invalid:visible text-red-600 font-light ml-6 text-[14px]">*กรอกข้อมูล</p>
                                </div>
                            </div>

                            <div class="flex flex-wrap justify-between mt-6 z-0">
                                <div class="w-[130px] flex justify-end"><p>ซัพพลายเออร์</p></div>
                                <div class="w-[450px] ml-6 h-[35px] ">
                                    <select name="supplier" data-te-select-init required>
                                        <option ></option>
                                        @foreach ($supplier as $sup) 
                                       <option value="{{$sup->s_code}}">{{$sup->SPnameTH}}</option>                                                                                                               
                                       @endforeach
                                       
                                       
                                      </select>
                                      <label data-te-select-label-ref>ซัพพลายเออร์</label>
                                </div>  
                            </div>
                            <div class="flex flex-wrap justify-between mt-6 z-0">
                                <div class="w-[130px] flex justify-end"><p>รายละเอียด</p></div>
                                 <textarea name="detail" class="pl-3 w-[450px] ml-6 h-[100px] border border-gray-300 rounded-[5px] pt-1"></textarea>
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