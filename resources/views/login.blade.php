@if (Session()->has('user')||Session()->has('admin'))
   <script>window.location = "/home";</script>
             
@endif

@extends('layout.homeLO')
@section('content')

<div class="login">

    
    <div class="login-bg flex justify-center pt-[50px]"  >
        <div class="login-l w-[350px] h-[500px] bg-gradient-to-b from-blue-800 to-blue-600  flex  justify-center rounded-l-3xl">
            {{-- <div class="text">
                <p class="">Sign in</p>
            </div> --}}
            <p class="text-white text-4xl pt-[150px]">Sign in</p>
        </div>
        <div class="login-r border-2 w-[450px] h-[500px] flex flex-col rounded-r-3xl items-center pt-[100px]" >
            <div class="logo flex space-x-2">
                <img class="w-12 h-12" src="{{url('/picture/logo.jpg')}}">
                <p class="text-4xl text-toblue">TOACS ADMIN</p>
            </div>
            <form action="{{route('loginck')}}" method="POST">
               @csrf
            <div class="email mt-4">
                <p>username :</p>
                <input type="text" name="username" class="border-2 rounded-lg mg-1 w-[250px] h-[40px] pl-3" placeholder="username" required>
            </div>
            <div class="password mt-2" >
                <p>Password :</p>
                <input type="password" name="password" class="border-2 rounded-lg mg-1 w-[250px] h-[40px] pl-3" placeholder="Password" required>
            </div>
            {{-- <div class="forgotpwd flex justify-end mt-[2px]">
                <a href="{{ url('forgot') }}" class="underline">forgot password</a>
            </div> --}}
            @if($error = Session()->get('error'))
            <div class="mt-1 text-red-600"  >
                {{$error}}
             </div>
            @endif
            <div class="signin ">
                <button type="submit" class="w-[90px] h-[45px] bg-blue-700 rounded-lg mt-8"><p class="text-white">Sign in</p></button>
            </div>
        </form>
       

        </div>
    </div>
    
</div>

@endsection