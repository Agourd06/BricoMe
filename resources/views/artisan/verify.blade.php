@extends('layouts.html')
@section('content')

    <section class="w-[100%] h-[100vh] flex justify-center items-center" >
        <section class="w-[35%] h-auto bg-gray-100 px-[10px] py-[20px] my-[25px] mx-[20px] rounded border-2 border-gray-800 flex flex-col items-center justify-center gap-y-6" >

            <div>
                <h1 class="text-2xl font-[900]" >Verify Your Account</h1>
                <p class="text-[16px] mt-4 font-[500]" >Please, Check Your Email Inbox To Verify Your Account,
                    <form action="/email/verification-notification" method="POST" class="mt-2" >
                        @csrf
                        @method('POST')
                        <button class="bg-blue-600 py-2 px-4 text-white border-2 border-blue-900" >Resend Link !</button>
                    </form>
                </p>
            </div>

        </section>
    </section>
@endsection
