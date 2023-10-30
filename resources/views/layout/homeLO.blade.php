<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    @vite('resources/css/app.css')

    <title>Document</title>
</head>
<script  src="js/sidebar.js"></script>
<body>
  
    <div class="navbar sticky top-0">
        @yield('navbar')
    </div>
    
    <div class="content" >
        @yield('content')
       
    </div>
</body>
@if(session()->has('success'))
<script>
    swal("Message","{{session('success')}}",'success',{
        button:true,
        button:"OK",
        //timer:2000
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

</html>