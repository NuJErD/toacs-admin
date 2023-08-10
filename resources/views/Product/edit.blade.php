@extends('layout.main')
@section('sidebar')
@include('layout.sidebarBack')
@endsection


@section('content')

<div class="main">
    <p class="text-[26px] font-bold mb-3 px-4">สินค้าและบริการ</p>
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
                        <form action="{{route('product.update',$p->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        <div class=" px-[10px] ">
                            <div class="flex flex-wrap justify-center mt-6">
                                
                                <div class="">
                                    <div class="border border-gray-300 w-[450px] h-[160px]">
                                        <img id="blah" src="/picture/product/{{$p->picture}}"  class="w-[240px] h-[130px]">
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-wrap justify-between mt-6">
                                <div class="w-[130px] flex justify-end"><p>รูปภาพสินค้า</p></div>
                                <div class=""><input name="productpic"  type="file" class="pl-3 w-[450px] ml-6 h-[35px]" onchange="readURL(this)" ></div>
                            </div>
                            <div class="flex flex-wrap justify-between mt-6">                               
                                <div class="w-[130px] flex justify-end"><p>ชื่อสินค้า(TH)</p></div>                                                                  
                                    <input name="PnameTH" value="{{$p->PnameTH}}" type="text" placeholder="ชื่อสินค้า" class="w-[450px] pl-3  ml-6 h-[35px] border border-gray-300 rounded-[5px]" required >                                                                                      
                        </div>
                            <div class="flex flex-wrap justify-between mt-6">
                                <div class="w-[130px] flex justify-end"><p>ชื่อสินค้า(EN)</p></div>
                                <div class=""><input name="PnameEN" value="{{$p->PnameEN}}" type="text" placeholder="ชื่อสินค้า(EN)" class="pl-3 w-[450px] ml-6 h-[35px] border border-gray-300 rounded-[5px]" required></div>
                            </div>
                            <div class="flex flex-wrap justify-between mt-6 z-0">
                                <div class="w-[130px] flex justify-end"><p>สังกัดหน่อยงาน</p></div>
                                <div class="w-[450px] ml-6 h-[35px] ">
                                    <select name="department[]"  data-te-select-init multiple value required>
                                        @foreach ($permissionUse as $decheck)
                                        <option value="{{$decheck->id}}" selected>{{$decheck->departTH}}</option>
                                        @endforeach
                                        
                                        @foreach ($permission as $de)
                                        <option  value="{{$de->id}}">{{$de->departTH}}</option>
                                        @endforeach
                                       
                                       
                                      </select>
                                      <label data-te-select-label-ref>หน่วยงาน</label>
                                </div>  
                            </div>
                            <div class="flex flex-wrap justify-between mt-6 z-0">
                                <div class="w-[130px] flex justify-end"><p>หมวดสินค้า</p></div>
                                <div class="w-[450px] ml-6 h-[35px] ">
                                    <select name="category" data-te-select-init required>
                                        <option value="{{$categories_use->id}}" selected>{{$categories_use->CnameTH}}</option> 
                                        @foreach ($categories as $c)
                                        <option value="{{$c->id}}">{{$c->CnameTH}}</option>
                                        @endforeach
                                                                                                                                                      
                                      </select>
                                      <label data-te-select-label-ref>หมวดสินค้า</label>
                                </div>  
                            </div>
                            <div class="flex flex-wrap justify-between mt-6">
                                <div class="w-[130px] flex justify-end"><p>ราคา</p></div>
                                <div class=""><input name="price" value="{{$p->price}}" type=text" placeholder="ราคา" class="pl-3 w-[450px] ml-6 h-[35px] border border-gray-300 rounded-[5px]" required></div>
                            </div>
                            <div class="flex flex-wrap justify-between mt-6">
                                <div class="w-[130px] flex justify-end"><p>หน่วย</p></div>
                                <div class=""><input name="unit" value="{{$p->unit}}" type="text" placeholder="หน่วย" class="pl-3 w-[450px] ml-6 h-[35px] border border-gray-300 rounded-[5px]" required></div>
                            </div>
                            <div class="flex flex-wrap justify-between mt-6 z-0">
                                <div class="w-[130px] flex justify-end"><p>ซัพพลายเออร์</p></div>
                                <div class="w-[450px] ml-6 h-[35px] ">
                                    <select name="supplier" data-te-select-init required>
                                       <option value="{{$supplier_use->id}}" selected>{{$supplier_use->SPnameTH}}</option>
                                       @foreach($supplier as $sup)
                                       <option value="{{$sup->id}}">{{$sup->SPnameTH}}</option>
                                       @endforeach
                                       
                                      </select>
                                      <label data-te-select-label-ref>ซัพพลายเออร์</label>
                                </div>  
                            </div>
                            <div class="flex flex-wrap justify-between mt-6 z-0">
                                <div class="w-[130px] flex justify-end"><p>รายละเอียด</p></div>
                                 <textarea name="detail" class="pl-3 w-[450px] ml-6 h-[100px] border border-gray-300 rounded-[5px] pt-1">{{$p->detail}}</textarea>
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