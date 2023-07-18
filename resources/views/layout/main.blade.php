@if (!Session()->has('admin'))
   <script>window.location = "/login";</script>
@endif
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    {{-- @include('sweetalert::alert') --}}
    <title>Document</title>
</head>
<script src="{{ asset('js/sidebar.js')}}"></script>
<script src="{{ asset('js/register.js')}}"></script>


{{-- <script
  type="text/javascript"
  src="../node_modules/tw-elements/dist/js/tw-elements.umd.min.js"></script> --}}
<body>
    
    <div class="main">
        @include('layout.nav')
        <div class="sidebar" >
            @yield('sidebar')
         </div>
     </div>
    
    
            <div id="contentmain" class="content ml-[85px] " >
                
            @yield('content')
              
        </div>
        

</body>
<footer>
    <div class="w-full h-[40px] bg-white"></div>
</footer>

</html>