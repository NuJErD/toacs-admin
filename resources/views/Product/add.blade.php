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
                        <div class="add bg-blue-600  rounded-[4px] h-8 mr-1 flex items-center px-2">ย้อนกลับ</div>
                        
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
                                <div class=""><input name="productpic" type="file" class="pl-3 w-[450px] ml-6 h-[35px]" onchange="readURL(this)" required></div>
                            </div>
                            <div class="flex flex-wrap justify-between mt-6">                               
                                <div class="w-[130px] flex justify-end"><p>ชื่อสินค้า(TH)</p></div>                                                                  
                                    <input name="PnameTH" type="text" placeholder="ชื่อสินค้า" class="w-[450px] pl-3  ml-6 h-[35px] border border-gray-300 rounded-[5px]" required >                                                                                      
                        </div>
                            <div class="flex flex-wrap justify-between mt-6">
                                <div class="w-[130px] flex justify-end"><p>ชื่อสินค้า(EN)</p></div>
                                <div class=""><input name="PnameEN" type="text" placeholder="ชื่อสินค้า(EN)" class="pl-3 w-[450px] ml-6 h-[35px] border border-gray-300 rounded-[5px]" required></div>
                            </div>
                            <div class="flex flex-wrap justify-between mt-6 z-0">
                                <div class="w-[130px] flex justify-end"><p>หมวดสินค้า</p></div>
                                <div class="w-[450px] ml-6 h-[35px] ">
                                    <select name="category" data-te-select-init required>
                                        <option value=""></option> 
                                       <option value="1">สินค้า</option>                                                                                                               
                                      </select>
                                      <label data-te-select-label-ref>หมวดสินค้า</label>
                                </div>  
                            </div>
                            <div class="flex flex-wrap justify-between mt-6">
                                <div class="w-[130px] flex justify-end"><p>ราคา</p></div>
                                <div class=""><input name="price" type=text" placeholder="ราคา" class="pl-3 w-[450px] ml-6 h-[35px] border border-gray-300 rounded-[5px]" required></div>
                            </div>
                            <div class="flex flex-wrap justify-between mt-6">
                                <div class="w-[130px] flex justify-end"><p>หน่วย</p></div>
                                <div class=""><input name="unit" type="text" placeholder="หน่วย" class="pl-3 w-[450px] ml-6 h-[35px] border border-gray-300 rounded-[5px]" required></div>
                            </div>
                            <div class="flex flex-wrap justify-between mt-6 z-0">
                                <div class="w-[130px] flex justify-end"><p>ซัพพลายเออร์</p></div>
                                <div class="w-[450px] ml-6 h-[35px] ">
                                    <select name="supplier" data-te-select-init multiple  required>
                                       <option value="1">1</option>
                                       
                                       
                                      </select>
                                      <label data-te-select-label-ref>ซัพพลายเออร์</label>
                                </div>  
                            </div>
                            <div class="flex flex-wrap justify-between mt-6 z-0">
                                <div class="w-[130px] flex justify-end"><p>รายละเอียด</p></div>
                                 <textarea name="detail" class="pl-3 w-[450px] ml-6 h-[100px] border border-gray-300 rounded-[5px] pt-1"></textarea>
                            </div>
                            {{-- <div class="flex flex-wrap justify-between mt-6">
                                <div class="w-[130px] flex justify-end"><p>ตำแหน่ง</p></div>
                                <div class="w-[450px] ml-6 h-[35px]">
                                    <select name="position"  class="" data-te-select-init required >
                                        <option value=""></option>
                                       
                                      </select>
                                      <label data-te-select-label-ref>ตำแหน่ง</label>
                                </div>
                            </div> --}}
                            {{-- <div class="flex flex-wrap mt-6">
                                <div class="w-[130px] flex justify-end"><p>สถานะ</p></div>
                                <div class="check ml-[30px]">
                                    <div class="flex items-center mb-4">
                                        <input type="hidden" name="requester" value="N">
                                        <input id="requester-checkbox" type="checkbox" name="requester" value="Y" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="requester-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Request</label>
                                    </div>
                                    <div class="flex items-center mb-4">
                                        <input type="hidden" name="approve" value="N">
                                        <input id="approve-checkbox" type="checkbox" name="approve" value="Y" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="approve-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Approve</label>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="flex flex-wrap justify-between mt-6">
                                <div class="w-[130px] flex justify-end"><p>อาคารที่อยู่</p></div>
                                <div class="w-[450px] ml-6 h-[35px]">
                                    <select name="phase"  class="" data-te-select-init required >
                                        <option value=""></option>
                                       
                                      </select>
                                      <label data-te-select-label-ref>อาคารที่อยู่</label>
                                </div>
                            </div> --}}
                            {{-- <div class="flex flex-wrap justify-between mt-6">
                                <div class="w-[130px] flex justify-end"><p>รหัสผ่าน</p></div>
                                <div class=""><input onkeyup="checkpw()" type="password" id="password" name="password" placeholder="รหัสผ่าน" class="  pl-3 w-[450px] ml-6 h-[35px] border border-gray-300 rounded-[5px]" required></div>
                            </div>
                            <div class="flex flex-wrap justify-between mt-6">
                                <div class="w-[130px] flex justify-end"><p>ยืนยันรหัสผ่าน</p></div>
                                <div class=""><input onkeyup="checkpw()" id="cfpassword" type="password" name="cfpassword" placeholder="ยืนยันรหัสผ่าน" class="pl-3 w-[450px] ml-6 h-[35px] border border-gray-300 rounded-[5px]" required></div>                                 --}}
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