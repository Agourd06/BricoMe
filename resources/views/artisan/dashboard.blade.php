@extends('layouts.html')
@section('content')

    <section class="w-[100%] h-[100vh] flex justify-between items-center" >
        @include('layouts.artisan.navBar')

        <section class="w-[90%] bg-gray-100 px-[10px] py-[20px] my-[25px] mx-[20px] rounded border-2 border-gray-800 overflow-y-scroll	" style="height: calc(100vh - (25px*2));" >

            @if($artisanData[0]->availablity === 'Available')
                <div class="bg-green-500 py-4 px-12 text-white text-xl font-[600] border-2 border-green-800" >
                    <p>your status : {{ $artisanData[0]->availablity }}</p>
                </div>
            @else
                <div class="bg-red-500 py-4 px-12 text-white text-xl font-[600] border-2 border-red-800" >
                    <p>your status : {{ $artisanData[0]->availablity }}</p>
                </div>
            @endif
        </section>
    </section>
@endsection
