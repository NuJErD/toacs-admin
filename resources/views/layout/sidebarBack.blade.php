<div class="fixed group  overflow-x-hidden w-[70px] bg-gradient-to-b from-blue-800 to-blue-600 min-h-[100vh] hover:w-[250px]  hover:ease-in-out duration-300  pt-6" onmouseover="toggleSidebar()" onmouseout="toggleSidebar()" >
    <ul>
        <li>
            <a href="{{ url('product') }}" class="flex  items-center p-5 pt-1 hover:bg-blue-900 text-white w-[250px]"><i class="fa-solid fa-basket-shopping w-[30px]"></i>
            <span class="ml-[10px]  opacity-0 group-hover:opacity-100  text-[20px]">สินค้าและบริการ</span>    
        </a></li>
        <li>
            <a href="{{ url('pr') }}" class="flex items-center p-5 pt-1 hover:bg-blue-900 text-white w-[250px]"><i class="fa-solid fa-clipboard-list w-[30px]"></i>
            <span class="ml-[10px] opacity-0 group-hover:opacity-100 text-[20px]">รายการรอการอนุมัติ</span>    
        </a></li>
        <li>
            <a href="" class="flex items-center p-5 pt-1 hover:bg-blue-900 text-white w-[250px]"> <i class="fa-solid fa-clipboard-list w-[30px]"></i>
            <span class="ml-[10px] opacity-0  group-hover:opacity-100 text-[18px] " >รายการใบขอสั่งซื้อ</span>   
         </a></li>
        <li>
            <a href="" class="flex items-center p-5 pt-1 hover:bg-blue-900 text-white w-[250px]"><i class="fa-solid fa-clipboard-check w-[30px]"></i>
            
            <span class="ml-[10px] opacity-0 group-hover:opacity-100  text-[18px]">รายการใบสั่งซื้อ</span> 
        
         </a></li>
        <li>
            <a href="" class="flex items-center p-5 pt-1 hover:bg-blue-900 text-white w-[250px]"><i class="fa-solid fa-clock-rotate-left w-[30px]"></i>
            <span class="ml-[10px] opacity-0 group-hover:opacity-100  text-[20px] ">ประวิตืการสั่งซื้อ</span>    
        </a></li><li>
            <a href="" class="flex items-center p-5 pt-1 hover:bg-blue-900 text-white w-[250px]"><i class="fa-solid fa-clock-rotate-left w-[30px]"></i>
            <span class="ml-[10px] opacity-0 group-hover:opacity-100  text-[20px] ">ประวัติการอนุมัติ</span>    
        </a></li>
    </a></li>
    <li class="mt-[160px]">
        <a href="{{route('logout')}}" class="flex items-center p-5 pt-1 hover:bg-blue-900 text-white w-[250px] "><i class="fa-solid fa-right-from-bracket w-[30px]"></i>
            <span class="ml-[10px] opacity-0 group-hover:opacity-100  text-[20px] ">loguot</span>   
    </a></li>
    </ul> 
    
   
