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
                    <div class="">สมัครผู้ใช้งาน</div>
                    <div class="btn flex justify-end flex-wrap  ">
                        <div class="add"><button class=" bg-blue-600  rounded-[4px] h-8 mr-1 flex items-center px-2 " onclick="goBack()">ย้อนกลับ</button></div>
                        
                    </div>
                </div>
                <div class="card-body borderpx-3 pt-4 pb-10 flex shadow-lg ">
                    
                    <div class="wrapped mx-auto">
                        <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class=" px-[10px] ">
                            <div class="flex flex-wrap justify-between mt-6">                               
                                <div class="w-[130px] flex justify-end"><p>ชื่อ-สกุล(TH)</p></div>                                                                  
                                    <input name="nameTH" type="text" placeholder="ชื่อ-สกุล(TH)" class="w-[450px] pl-3  ml-6 h-[35px] border border-gray-300 rounded-[5px]" required >                                                                                      
                        </div>
                            <div class="flex flex-wrap justify-between mt-6">
                                <div class="w-[130px] flex justify-end"><p>ชื่อ-สกุล(EN)</p></div>
                                <div class=""><input name="nameEN" type="text" placeholder="ชื่อ-สกุล(EN)" class="pl-3 w-[450px] ml-6 h-[35px] border border-gray-300 rounded-[5px]" required></div>
                            </div>
                            <div class="flex flex-wrap justify-between mt-6">
                                <div class="w-[130px] flex justify-end"><p>เบอร์โทรศัพท์</p></div>
                                <div class=""><input name="phone" type="text" placeholder="เบอร์โทรศัพท์" class="pl-3 w-[450px] ml-6 h-[35px] border border-gray-300 rounded-[5px]" required></div>
                            </div>
                            <div class="flex flex-wrap justify-between mt-6">
                                <div class="w-[130px] flex justify-end"><p>อีเมล</p></div>
                                <div class=""><input name="email" type="email" placeholder="อีเมล" class="pl-3 w-[450px] ml-6 h-[35px] border border-gray-300 rounded-[5px]" required></div>
                            </div>
                            <div class="flex flex-wrap justify-between mt-6 z-0">
                                <div class="w-[130px] flex justify-end"><p>สังกัดหน่อยงาน</p></div>
                                <div class="w-[450px] ml-6 h-[35px] ">
                                    <select name="department[]" data-te-select-init multiple  required>
                                        @foreach ($department as $de)
                                        <option  value="{{$de->id}}">{{$de->departTH}}</option>
                                        @endforeach
                                       
                                       
                                      </select>
                                      <label data-te-select-label-ref>หน่วยงาน</label>
                                </div>  
                            </div>
                            <div class="flex flex-wrap justify-between mt-6">
                                <div class="w-[130px] flex justify-end"><p>ตำแหน่ง</p></div>
                                <div class="w-[450px] ml-6 h-[35px]">
                                    <select name="position"  class="" data-te-select-init required >
                                        <option value=""></option>
                                        @foreach ($position as $ps)
                                        <option value="{{$ps->id}}">{{$ps->posTH}}</option>
                                        @endforeach
                                      </select>
                                      <label data-te-select-label-ref>ตำแหน่ง</label>
                                </div>
                            </div>
                            <div class="flex flex-wrap mt-6">
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
                            </div>
                            <div class="flex flex-wrap justify-between mt-6">
                                <div class="w-[130px] flex justify-end"><p>อาคารที่อยู่</p></div>
                                <div class="w-[450px] ml-6 h-[35px]">
                                    <select name="phase"  class="" data-te-select-init required >
                                        <option value=""></option>
                                        @foreach ($phase as $ph)
                                        <option value="{{$ph->id}}">{{$ph->phaseTH}}</option>
                                        @endforeach
                                      </select>
                                      <label data-te-select-label-ref>อาคารที่อยู่</label>
                                </div>
                            </div>
                            <div class="flex flex-wrap justify-between mt-6">
                                <div class="w-[130px] flex justify-end"><p>รหัสผ่าน</p></div>
                                <div class=""><input onkeyup="checkpw()" type="password" id="password" name="password" placeholder="รหัสผ่าน" class="  pl-3 w-[450px] ml-6 h-[35px] border border-gray-300 rounded-[5px]" required></div>
                            </div>
                            <div class="flex flex-wrap justify-between mt-6">
                                <div class="w-[130px] flex justify-end"><p>ยืนยันรหัสผ่าน</p></div>
                                <div class=""><input onkeyup="checkpw()" id="cfpassword" type="password" name="cfpassword" placeholder="ยืนยันรหัสผ่าน" class="pl-3 w-[450px] ml-6 h-[35px] border border-gray-300 rounded-[5px]" required></div>                                
                            </div>
                            <div class="text-red-500 text-[14px] ml-[155px]" id="passwordcf-feed" ></div>
                            <div class="flex flex-wrap justify-between mt-6">
                                <div class="w-[130px] flex justify-end"></div>
                                <div class="">
                                    <div class="border border-gray-300 w-[450px] h-[160px]">
                                        <img id="blah" src="" class="">
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-wrap justify-between mt-6">
                                <div class="w-[130px] flex justify-end"><p>ลายเซ็น</p></div>
                                <div class=""><input name="signature" type="file" class="pl-3 w-[450px] ml-6 h-[35px]" onchange="readURL(this)" required></div>
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