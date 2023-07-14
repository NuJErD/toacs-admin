@if (!Session()->has('admin'))
   <script>window.location = "/login";</script>
@endif

@extends("layout.main")
@section('sidebar')
@include('layout.sidebarBack')
@endsection
@section('content')

<div class=" min-h-[100vh]  max-w-[1200px] m-6   ">
  <div class="service">
    {{-- <div class="menu-ser flex justify-between">
      <div class="text-xl">Service</div>
      <div class="text-xl"><a>Category</a></div>
    </div> --}}
  </div>
  <div class="head">

  </div>
  
  <div class="list-items border border-gray  grid  md:grid-cols-3 lg:grid-cols-5 xl:grid-cols-7 ">
    
</div>



<!-- Sidenav -->

  @endsection 
