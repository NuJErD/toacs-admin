
<div class="">
    <ul class=" h-full overflow-y-auto fixed  overflow-x-hidden group  w-[70px] bg-gradient-to-b from-blue-800 to-blue-600  hover:w-[250px]  hover:ease-in-out duration-300  pt-6 "onmouseover="toggleSidebar()" onmouseout="toggleSidebar()">
        
        
            <li>
                <a href="{{ route('po.index') }}" class="flex items-center p-5 pt-1 hover:bg-blue-900 text-white w-[250px]"><i class="fa-solid fa-clipboard-list w-[30px]"></i>
                <span class="ml-[10px] opacity-0 group-hover:opacity-100 text-[16px]">สร้างใบสั่งซื้อ (PO)</span>    
            </a></li>
            
                
                    <li>
                        <a href="{{ route('listpoDeli') }}" class="flex items-center p-5 pt-1 hover:bg-blue-900 text-white w-[250px]"><i class="fa-solid fa-clipboard-list w-[30px]"></i>
                        <span class="ml-[10px] opacity-0 group-hover:opacity-100 text-[16px]">ใบสั่งซื้อ (รอจัดส่ง)</span>    
                    </a></li>
                    <li>
                        <a href="{{route('POhistory')}}" class="flex items-center p-5 pt-1 hover:bg-blue-900 text-white w-[250px]"><i class="fa-solid fa-clipboard-list w-[30px]"></i>
                        <span class="ml-[10px] opacity-0 group-hover:opacity-100 text-[16px]">ประวัติ PO</span>    
                    </a></li>
                    <li>
                        <a href="{{ route('pr.index') }}" class="flex items-center p-5 pt-1 hover:bg-blue-900 text-white w-[250px]"><i class="fa-solid fa-clipboard-list w-[30px]"></i>
                        <span class="ml-[10px] opacity-0 group-hover:opacity-100 text-[16px]">ใบขอสั่งซื้อ (PR)</span>    
                    </a></li>
                    <li>            
            <a href="{{ url('product') }}" class="flex  items-center p-5 pt-1 hover:bg-blue-900 text-white w-[250px]"><i class="fa-solid fa-basket-shopping w-[30px]"></i>
            <span class="ml-[10px]  opacity-0 group-hover:opacity-100  text-[16px]">สินค้าและบริการ</span>    
        </a></li>
        <li >
            <a href="{{route('user.index')}}" class="flex items-center p-5 pt-1 hover:bg-blue-900 text-white w-[250px] "><i class="fa-solid fa-user w-[30px]"></i>
                <span class="ml-[10px] opacity-0 group-hover:opacity-100  text-[16px] ">ผู้ใช้งาน</span>   
        </a></li>
        <li>
            <a href="{{route('categories.index')}}" class="flex items-center p-5 pt-1 hover:bg-blue-900 text-white w-[250px]"><i class="fa-solid fa-clipboard-list w-[30px]"></i>
            <span class="ml-[10px] opacity-0 group-hover:opacity-100  text-[16px] ">หมวดสินค้า</span>    
        </a></li>
       
        <li>
            <a href="{{route('supplier.index')}}" class="flex items-center p-5 pt-1 hover:bg-blue-900 text-white w-[250px]"><i class="fa-solid fa-people-group w-[30px]" style="color: #ffffff;"></i>
            <span class="ml-[10px] opacity-0 group-hover:opacity-100  text-[16px] ">ซัพพลายเออร์</span>    
        </a>
        </li>
        <li>
            <a href="{{route('supplierType.index')}}" class="flex items-center p-5 pt-1 hover:bg-blue-900 text-white w-[250px]"><i class="fa-solid fa-people-group w-[30px]" style="color: #ffffff;"></i>
            <span class="ml-[10px] opacity-0 group-hover:opacity-100  text-[16px] ">ประเภทซัพพลายเออร์</span>    
        </a>
        </li>

        
            <li>
            <a href="{{ route('department.index') }}" class="flex items-center p-5 pt-1 hover:bg-blue-900 text-white w-[250px]"><i class="fa-solid fa-clipboard-list w-[30px]"></i>
            <span class="ml-[10px] opacity-0 group-hover:opacity-100 text-[16px]">สังกัดหน่อยงาน</span>    
        </a></li>
        @if (Session()->has('admin'))
        <li>
            <a href="{{route('user.edit', session('admin'))}}" class="flex items-center p-5 pt-1 hover:bg-blue-900 text-white w-[250px]"><i class="fa-regular fa-pen-to-square w-[30px]" style="color: #ffffff;"></i>
            <span class="ml-[10px] opacity-0 group-hover:opacity-100  text-[16px] ">แก้ไขข้อมมูลส่วนตัว</span>    
        </a></li>
        <li >
            <a href="{{route('changePW')}}" class="flex items-center p-5 pt-1 hover:bg-blue-900 text-white w-[250px]"><i class="fa-solid fa-lock w-[30px]" style="color: #ffffff;"></i>
            <span class="ml-[10px] opacity-0 group-hover:opacity-100  text-[16px] ">เปลี่ยนรหัสผ่าน</span>    
        </a>
        </li>
        @endif
      
    <li class=" pb-[150px]">
        <a href="{{route('logout')}}" class="flex items-center p-5 pt-1 hover:bg-blue-900 text-white w-[250px] "><i class="fa-solid fa-right-from-bracket w-[30px]"></i>
            <span class="ml-[10px] opacity-0 group-hover:opacity-100  text-[16px] ">logout</span>   
    </a></li>
  
    </ul> 
    
   



{{-- 
<div class=""> 
    <ul class="min-h-full  overflow-y-auto fixed  overflow-x-hidden group  w-[70px] bg-gradient-to-b from-blue-800 to-blue-600 h-screen hover:w-[250px]  hover:ease-in-out duration-300  pt-6 " onmouseover="toggleSidebar()" onmouseout="toggleSidebar()">
        
   
    
    </ul> 
</div>

   


  
 --}}
