@extends('layouts.html')
@section('content')

    <section class="w-[100%] h-[100vh] flex justify-between items-center" >
        @include('layouts.artisan.navBar')

        <section class="w-[90%] bg-gray-100 px-[10px] py-[20px] my-[25px] mx-[20px] rounded border-2 border-gray-800 overflow-y-scroll	" style="height: calc(100vh - (25px*2));" >


            <div class=" px-6 py-8 " >
                <h1 class="text-2xl font-[900]" >Update Information</h1>
                <p class="text-[16px] font-[500]" >Easily manage and update your information to ensure it's always current and accurate.</p>

                <img src="{{ $userDATA[0]->Profil }}" class="w-[140px] mt-[15px] rounded-[20px]" >
                <img src="http://127.0.0.1:8000/uploads/artisan/picture/{{ $userDATA[0]->Profil }}" class="w-[140px] mt-[15px] rounded-[20px]"  >

                <form action="" method="POST" enctype="multipart/form-data" class="flex flex-wrap justify-between gap-4 mt-[15px]" >
                    @csrf
                    @method('PATCH')

                    <input type="file"  name="picture" class="outline-none border-2 border-gray-800 px-4 py-2 w-[48%]" >
                    <input type="text" value="{{ $userDATA[0]->lname }}" placeholder="Name" name="lname" class="outline-none border-2 border-gray-800 px-4 py-2 w-[48%]" >
                    <input type="text" value="{{ $userDATA[0]->email }}" placeholder="Email Address" name="email" class="outline-none border-2 border-gray-800 px-4 py-2 w-[48%]" >
                    <input type="date" value="{{ $userDATA[0]->birthday }}" name="birthday" class="outline-none border-2 border-gray-800 px-4 py-2 w-[48%]" >
                    <select name="city" class="outline-none border-2 border-gray-800 px-4 py-2 w-[48%]">
                        <option disabled  selected >Choose Your City</option>
                        @foreach($cities as $city)
                            @if($userDATA[0]->city === $city)
                                <option value="{{ $city }}" selected >{{ $city }}</option>
                            @else
                                <option value="{{ $city }}" >{{ $city }}</option>
                            @endif
                        @endforeach
                    </select>
                    <input type="number" value="{{ $userDATA[0]->Phone }}" placeholder="06 00 00 00 00" name="Phone" class="outline-none border-2 border-gray-800 px-4 py-2 w-[48%]" >
                    <button class="outline-none border-2 border-gray-800 px-4 py-2 bg-gray-500 text-white w-[48%]" >Update Your Password</button>
                </form>
            </div >
        </section>
    </section>
@endsection
