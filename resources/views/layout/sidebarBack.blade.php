
<div class=""> 
    <ul class="fixed overflow-y-auto overflow-x-hidden group  w-[70px] bg-gradient-to-b from-blue-800 to-blue-600 h-screen hover:w-[250px]  hover:ease-in-out duration-300  pt-6 " onmouseover="toggleSidebar()" onmouseout="toggleSidebar()">
        <li>
            <a href="{{ url('product') }}" class="flex  items-center p-5 pt-1 hover:bg-blue-900 text-white w-[250px]"><i class="fa-solid fa-basket-shopping w-[30px]"></i>
            <span class="ml-[10px]  opacity-0 group-hover:opacity-100  text-[16px]">สินค้าและบริการ</span>    
        </a></li>
        <li >
            <a href="{{route('user.index')}}" class="flex items-center p-5 pt-1 hover:bg-blue-900 text-white w-[250px] "><i class="fa-solid fa-user w-[30px]"></i>
                <span class="ml-[10px] opacity-0 group-hover:opacity-100  text-[16px] ">ผู้ใช้งาน</span>   
        </a></li>
        <li>
            <a href="{{route('categories.index')}}" class="flex items-center p-5 pt-1 hover:bg-blue-900 text-white w-[250px]"><i class="fa-solid fa-clock-rotate-left w-[30px]"></i>
            <span class="ml-[10px] opacity-0 group-hover:opacity-100  text-[16px] ">หมวดสินค้า</span>    
        </a></li>
        @if (Session()->has('admin'))
        <li>
            <a href="{{route('user.edit', session('admin'))}}" class="flex items-center p-5 pt-1 hover:bg-blue-900 text-white w-[250px]"><i class="fa-solid fa-clock-rotate-left w-[30px]"></i>
            <span class="ml-[10px] opacity-0 group-hover:opacity-100  text-[16px] ">แก้ไขข้อมมูลส่วนตัว</span>    
        </a></li>
        @endif
        <li>
            <a href="{{route('supplier.index')}}" class="flex items-center p-5 pt-1 hover:bg-blue-900 text-white w-[250px]"><i class="fa-solid fa-clock-rotate-left w-[30px]"></i>
            <span class="ml-[10px] opacity-0 group-hover:opacity-100  text-[16px] ">ซัพพลายเออร์</span>    
        </a>
        </li>
        <li>
            <a href="{{route('supplierType.index')}}" class="flex items-center p-5 pt-1 hover:bg-blue-900 text-white w-[250px]"><i class="fa-solid fa-clock-rotate-left w-[30px]"></i>
            <span class="ml-[10px] opacity-0 group-hover:opacity-100  text-[16px] ">ประเภทซัพพลายเออร์</span>    
        </a>
        </li>

        <li>
            <a href="{{ url('pr') }}" class="flex items-center p-5 pt-1 hover:bg-blue-900 text-white w-[250px]"><i class="fa-solid fa-clipboard-list w-[30px]"></i>
            <span class="ml-[10px] opacity-0 group-hover:opacity-100 text-[16px]">รายการรอการอนุมัติ</span>    
        </a></li>
        <li>
            <a href="" class="flex items-center p-5 pt-1 hover:bg-blue-900 text-white w-[250px]"> <i class="fa-solid fa-clipboard-list w-[30px]"></i>
            <span class="ml-[10px] opacity-0  group-hover:opacity-100 text-[16px] " >รายการใบขอสั่งซื้อ</span>   
         </a></li>
        <li>
            <a href="" class="flex items-center p-5 pt-1 hover:bg-blue-900 text-white w-[250px]"><i class="fa-solid fa-clipboard-check w-[30px]"></i>            
            <span class="ml-[10px] opacity-0 group-hover:opacity-100  text-[16px]">รายการใบสั่งซื้อ</span> 
         </a></li>
       
       
        
        
        <li>
            <a href="" class="flex items-center p-5 pt-1 hover:bg-blue-900 text-white w-[250px]"><i class="fa-solid fa-clock-rotate-left w-[30px]"></i>
            <span class="ml-[10px] opacity-0 group-hover:opacity-100  text-[16px] ">ประวัติการอนุมัติ</span>    
        </a></li>
        <li>
            <a href="" class="flex items-center p-5 pt-1 hover:bg-blue-900 text-white w-[250px]"><i class="fa-solid fa-clock-rotate-left w-[30px]"></i>
            <span class="ml-[10px] opacity-0 group-hover:opacity-100  text-[16px] ">ประวัติการอนุมัติ</span>    
        </a></li>
        <li>
            <a href="" class="flex items-center p-5 pt-1 hover:bg-blue-900 text-white w-[250px]"><i class="fa-solid fa-clock-rotate-left w-[30px]"></i>
            <span class="ml-[10px] opacity-0 group-hover:opacity-100  text-[16px] ">ประวัติการอนุมัติ</span>    
        </a></li>
      
    <li >
        <a href="{{route('logout')}}" class="flex items-center p-5 pt-1 hover:bg-blue-900 text-white w-[250px] "><i class="fa-solid fa-right-from-bracket w-[30px]"></i>
            <span class="ml-[10px] opacity-0 group-hover:opacity-100  text-[16px] ">loguot</span>   
    </a></li>
    <li >
        <a href="{{route('logout')}}" class="flex items-center p-5 pt-1 hover:bg-blue-900 text-white w-[250px] "><i class="fa-solid fa-right-from-bracket w-[30px]"></i>
            <span class="ml-[10px] opacity-0 group-hover:opacity-100  text-[16px] ">loguot</span>   
    </a></li>
    <li >
        <a href="{{route('logout')}}" class="flex items-center p-5 pt-1 hover:bg-blue-900 text-white w-[250px] "><i class="fa-solid fa-right-from-bracket w-[30px]"></i>
            <span class="ml-[10px] opacity-0 group-hover:opacity-100  text-[16px] ">loguot</span>   
    </a></li>
    
    </ul> 
</div>

   


  

