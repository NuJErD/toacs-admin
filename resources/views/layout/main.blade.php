@if (!Session()->has('admin'))
   <script>window.location = "/login";</script>
@endif
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="{{ asset('/css/pagination.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href=" https://cdn.datatables.net/1.13.6/css/dataTables.tailwindcss.min.css">
   
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
  
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    @vite('resources/js/chart.js')
    {{-- @include('sweetalert::alert') --}}
    <title>Document</title>
    <script>
        window.addEventListener('pageshow', function(event) {
            if (event.persisted) {
                location.reload(true);
            }
        });
    </script>
</head>
<script src="{{ asset('js/sidebar.js')}}"></script>
<script src="{{ asset('js/register.js')}}"></script>
<script src="{{ asset('js/Home.js')}}"></script>
<script src="{{ asset('js/product.js')}}"></script>
<script src="{{ asset('js/po.js')}}"></script>
<script src="{{ asset('js/search.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


{{-- <script
  type="text/javascript"
  src="../node_modules/tw-elements/dist/js/tw-elements.umd.min.js"></script> --}}
<body class=" overflow-y-scroll">
    
    <div class="main  ">
        @include('layout.nav')
        <div class="sidebar   ">

           
                 @yield('sidebar')
            
           
         </div>
     </div>
    
    
            <div id="contentmain" class="content ml-[85px] " >
                
            @yield('content')
              
        </div>
        

</body>


@if(session()->has('success'))
<script>
    Swal.fire({
                title: 'Message',
                text: '{{session('success')}}',
                icon: 'success',
                confirmButtonText: 'OK',
               
            }).then((result) => {
                
                    location.reload();
                
            })

           
</script>
@endif
@if(session()->has('error'))
<script>
    swal("Message","{{session('error')}}",'error',{
        button:true,
        button:"OK",
        //timer:2000
    })
</script>
@endif
<footer>
    <div class="w-full h-[40px] bg-white"></div>
</footer>

</html>