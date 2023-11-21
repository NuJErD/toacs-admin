

@extends("layout.main")
@section('sidebar')
@include('layout.sidebarBack')
@endsection
@section('content')


<div class=" min-h-[100vh]  min-w-[600px] m-6 bg-[#f1f1fa] ">

  
  <div class="service flex justify-between pt-6 px-5">

    <div class=" min-w-[600px] min-h-[300px] bg-white rounded-lg shadow-xl">
        <div class=" p-2">
            <canvas id="myChart"></canvas>
        </div>
       
    </div>

    <div class=" min-w-[400px] bg-white min-h-[300px] rounded-lg shadow-xl">
      <div class="w-[250px]">
        <canvas id="pie"></canvas>
      </div>
    </div>


    
  
    
    
    <script src="{{ mix('/js/app.js') }}"></script>
    


  </div>
 
 
  <div class="flex flex-wrap px-4  mt-4">

    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
    <div class=" flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
    <div class="flex-auto p-4">
    <div class="flex flex-row -mx-3">
    <div class="flex-none w-2/3 max-w-full px-3">
    <div>
    <p class="mb-0 font-sans font-semibold leading-normal uppercase dark:text-white dark:opacity-60 text-sm">รายการ PR ที่เหลือ</p>
    <h5 class="mb-2 font-bold dark:text-white" id="PRbar"></h5>
    <p class="mb-0 dark:text-white dark:opacity-60">
    <span class="font-bold leading-normal text-sm text-emerald-500"></span>
    
    </p>
    </div>
    </div>
    <div class="px-3 text-right basis-1/3">
    <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-blue-500 to-violet-500">
    <i class="ni ni-money-coins text-lg relative top-3.5 text-white"></i>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    
    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
    <div class=" flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
    <div class="flex-auto p-4">
    <div class="flex flex-row -mx-3">
    <div class="flex-none w-2/3 max-w-full px-3">
    <div>
    <p class="mb-0 font-sans font-semibold leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Today's Users</p>
    <h5 class="mb-2 font-bold dark:text-white">2,300</h5>
    <p class="mb-0 dark:text-white dark:opacity-60">
    <span class="font-bold leading-normal text-sm text-emerald-500"></span>
   
    </p>
    </div>
    </div>
    <div class="px-3 text-right basis-1/3">
    <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-red-600 to-orange-600">
    <i class="ni ni-world text-lg relative top-3.5 text-white"></i>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    
    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
    <div class=" flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
    <div class="flex-auto p-4">
    <div class="flex flex-row -mx-3">
    <div class="flex-none w-2/3 max-w-full px-3">
    <div>
    <p class="mb-0 font-sans font-semibold leading-normal uppercase dark:text-white dark:opacity-60 text-sm">New Clients</p>
    <h5 class="mb-2 font-bold dark:text-white">+3,462</h5>
    <p class="mb-0 dark:text-white dark:opacity-60">
    <span class="font-bold leading-normal text-red-600 text-sm"></span>
  
    </p>
    </div>
    </div>
    <div class="px-3 text-right basis-1/3">
    <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-emerald-500 to-teal-400">
    <i class="ni ni-paper-diploma text-lg relative top-3.5 text-white"></i>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    
    <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
    <div class="flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
    <div class="flex-auto p-4">
    <div class="flex flex-row -mx-3">
    <div class="flex-none w-2/3 max-w-full px-3">
    <div>
    <p class="mb-0 font-sans font-semibold leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Sales</p>
    <h5 class="mb-2 font-bold dark:text-white">$103,430</h5>
    <p class="mb-0 dark:text-white dark:opacity-60">
    <span class="font-bold leading-normal text-sm text-emerald-500"></span>

    </p>
    </div>
    </div>
    <div class="px-3 text-right basis-1/3">
    <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-orange-500 to-yellow-500">
    <i class="ni ni-cart text-lg relative top-3.5 text-white"></i>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
  </div>
  



<!-- Sidenav -->
  @endsection 
