@extends('layouts.html')
@section('content')

    <section class="w-[100%] h-[100vh] flex justify-between items-center" >
        @include('layouts.artisan.navBar')

        <section class="w-[90%] h-auto bg-gray-100 px-[10px] py-[20px] my-[25px] mx-[20px] rounded border-2 border-gray-800 overflow-y-scroll	flex flex-wrap items-start justify-between gap-y-6" style="height: calc(100vh - (25px*2));" >

            <div class="border-2 border-gray-800 rounded px-6 py-8 bg-gray-300/70 w-[48%]" >
                <h1 class="text-2xl font-[900]" >Update Password</h1>
                <p class="text-[16px] font-[500]" >Keep your account secure and up-to-date by easily updating your password here !</p>
                <form action="" method="POST" class="flex gap-x-4 mt-[15px]" >
                    @csrf
                    @method('PUT')
                    <input type="password" placeholder="Your New Password" name="password" class="outline-none border-2 border-gray-800 px-4 py-2 w-[50%]" >
                    <button class="outline-none border-2 border-gray-800 px-4 py-2 bg-gray-500 text-white" >Update Your Password</button>
                </form>
                @error('password')
                <p class="text-red-600 pt-2" >{{ $message }}</p>
                @enderror
            </div>

            <div class="border-2 border-red-800 rounded px-6 py-8 bg-red-200/50 w-[48%]" >
                <h1 class="text-2xl font-[900]" >Delete Your Account </h1>
                <p class="text-[16px] font-[500]" >Once Deleting You Data Will Be Deleted</p>

                <form action="" method="POST" class="flex gap-x-4 mt-[15px]" >
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Are You Sure You Want To Delete Your Account ?')" class="outline-none border-2 border-red-800 px-4 py-2 bg-red-500 text-white" >Delete Your Account</button>
                </form>
            </div>

        </section>
    </section>
@endsection
