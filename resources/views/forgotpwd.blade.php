@extends('layout.homeLO')
@section('content')
<div class="login">
    
    <div class="login-bg flex justify-center pt-[50px]"  >
        <div class="login-l w-[350px] h-[500px] bg-gradient-to-b from-blue-800 to-blue-600  flex  justify-center rounded-l-3xl">
            <p class="text-white text-4xl pt-[150px]">Forgot password</p>
        </div>
        <div class="login-r border-2 w-[450px] h-[500px] flex flex-col rounded-r-3xl items-center pt-[50px] px-[50px]" >
            <div class="return flex mr-[330px] pb-[50px]">
                <svg  class=" w-6 h-6 text-gray-800  dark:text-white cursor-pointer" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10" onclick="history.back()">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                </svg>
            
            </div>
            <div class="logo flex space-x-2">
                <img class="w-12 h-12" src="{{url('/picture/logo.jpg')}}">
                <p class="text-4xl text-toblue">TOACS</p>
            </div>
            <form action="#">
            <div class="email mt-4">
                <p class="mb-1">Email :</p>
                <input type="email" class="border-2 border-black rounded-lg mg-1 w-[250px] h-[40px] pl-3 " placeholder="Email">
                <p class="mt-2">Please enter your email address to request a new password via The system will send to your email.</p>
            </div>
            
            <div class="signin ">
                <button class="w-[90px] h-[45px] bg-blue-700 rounded-lg mt-10"><p class="text-white">CONFIRM</p></button>
            </div>
        </form>

        </div>
    </div>
    
</div>
@endsection