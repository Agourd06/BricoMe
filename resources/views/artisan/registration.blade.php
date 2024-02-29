@extends('layouts.html')
@section('content')

    <section class="w-[100%] h-[100vh] flex justify-center items-center" >
        <section class="w-[35%] h-auto bg-gray-100 px-[10px] py-[20px] my-[25px] mx-[20px] rounded border-2 border-gray-800" >


            <div class="flex items-center justify-center gap-x-4  px-6 py-[3px] rounded" >
                <img src="http://127.0.0.1:8000/img/icons/github.png" class="w-[40px]" >
                <a href="/auth/github/redirect/" class="font-[600] text-xl" >Sign In With Github</a>
            </div>


        </section>
    </section>
@endsection
