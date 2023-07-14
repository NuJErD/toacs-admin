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

</html>