@extends('layouts.html')
@section('content')

    <section class="w-[100%] h-[100vh] flex justify-between items-center" >
        @include('layouts.artisan.navBar')

        <section class="w-[90%] bg-gray-100 px-[10px] py-[20px] my-[25px] mx-[20px] rounded border-2 border-gray-800 overflow-y-scroll	" style="height: calc(100vh - (25px*2));" >

            <div class=" px-6 py-8 " >
                <h1 class="text-2xl font-[900]" >Professional Information</h1>
                <p class="text-[16px] font-[500]" >Easily manage and update your information to ensure it's always current and accurate.</p>

                <form action="/artisan/profile/professional" method="POST" enctype="multipart/form-data" class="flex flex-wrap justify-between gap-4 mt-[15px]" >
                    @csrf
                    @method('PATCH')

                    <textarea class="outline-none border-2 border-gray-800 px-4 py-2 w-[100%] h-[100px]" name="description" placeholder="Your Profile Description">{{ $artisanDATA->description }}</textarea>
                    <button class="outline-none border-2 border-gray-800 px-4 py-2 bg-gray-500 text-white w-[100%]" >Update Your Professional Profile</button>
                </form>


                <div class="flex flex-wrap justify-between gap-4 mt-[50px]" >

                    <div class="w-[48%] bg-gray-300 px-6 py-4 border-2 border-gray-800" >
                        <form action="/artisan/add/job/" method="POST" enctype="multipart/form-data" class="flex flex-wrap justify-between gap-4 mt-[15px]" >
                            @csrf
                            <select name="job_id" class="outline-none border-2 border-gray-800 px-4 py-2  w-[70%]">
                                <option disabled selected >Select The Job You Want</option>
                                @foreach($jobs as $job)
                                    <option value="{{ $job->id }}">{{ $job->name }}</option>
                                @endforeach
                            </select>
                            <button class="outline-none border-2 border-gray-800 px-4 py-2 bg-gray-500 text-white w-[20%]" >Add Job</button>
                        </form>

                        <div>
                            @foreach($artisanJOBS as $job)
                                <div>
                                    <h1> {{ $job  }} </h1>
                                    <form action="">
                                        <button>Delete</button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="w-[48%] bg-gray-300 px-6 py-4 border-2 border-gray-800" >
                        <form action="/artisan/add/cmp" method="POST" enctype="multipart/form-data" class="flex flex-wrap justify-between gap-4 mt-[15px]" >
                            @csrf
                            <select name="competence" class="outline-none border-2 border-gray-800 px-4 py-2  w-[35%]">
                                <option disabled selected >Select The Skill You Want</option>
                                @foreach($skills as $skill)
                                    <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                                @endforeach
                            </select>
                            <input type="number" name="tarif" placeholder="tarif" class="outline-none border-2 border-gray-800 px-4 py-2  w-[35%]">
                            <button class="outline-none border-2 border-gray-800 px-4 py-2 bg-gray-500 text-white w-[20%]" >Add Cmp</button>
                        </form>
                    </div>

                </div>

            </div >
        </section>
    </section>
@endsection
