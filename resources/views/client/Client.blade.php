<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


    <title>Document</title>
</head>

<body>

    @extends('layouts/ClientSideBar')

    @section('artisans')
        {{-- --------------------------------Blog section--------------------------------  --}}
        <div class="relative w-full z-30 ">
            <video class="w-full h-[30vh] md:h-[20vh] lg:h-[20vh] xl:h-[40vh] object-cover" autoplay loop muted>
                <source src="{{ asset('storage/image/' . 'bricolage.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2  text-center">
                <h2 class="text-xl  md:text-2xl lg:text-5xl font-bold text-[#3554AD]">Welcome to Our Premium Service
                </h2>
                <p class="mt-2 text-center text-sm md:text-lg lg:text-xl text-[#F9B100]">Explore the simplicity of handling
                    various tasks and projects with Bricolage Companion - where ease aligns with exceptional craftsmanship.
                </p>
            </div>
        </div>

        {{-- --------------------------------End Blog section--------------------------------  --}}

        {{-- --------------------------------Filter section--------------------------------  --}}

        <div class=" w-full p-4">

            <div class="flex flex-col ">
                <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-lg">
                    <form class="" action="/Client" method="GET">


                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">
                            <div class="flex flex-col">
                                <label for="manufacturer" class="text-sm font-medium text-stone-600">Jobs</label>

                                <select id="manufacturer" name="filterJobs"
                                    class="mt-2 block w-full rounded-md border border-gray-100 bg-gray-100 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <option value="{{ null }}">none</option>

                                    @foreach ($jobs as $job)
                                        <option value="{{ $job->id }}">{{ $job->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="flex flex-col">
                                <label for="manufacturer" class="text-sm font-medium text-stone-600">Manufacturer</label>

                                <select id="manufacturer" name="filterCompetence"
                                    class="mt-2 block w-full rounded-md border border-gray-100 bg-gray-100 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <option value="{{ null }}">none</option>

                                    @foreach ($competences as $competence)
                                        <option value="{{ $competence->id }}">{{ $competence->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        

                            <div class="flex flex-col">
                                <label for="status" class="text-sm font-medium text-stone-600">Citys</label>

                                <select id="status" name="filterCitys"
                                    class="mt-2 block w-full cursor-pointer rounded-md border border-gray-100 bg-gray-100 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <option value="{{ null }}">none</option>

                                    @foreach ($citys as $city)
                                        <option>{{ $city->city }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mt-6 grid w-full grid-cols-2 justify-end space-x-4 md:flex">
                            <button
                                class="rounded-lg bg-gray-200 px-8 py-2 font-medium text-gray-700 outline-none hover:opacity-80 focus:ring">Reset</button>
                            <button
                                class="rounded-lg bg-blue-600 px-8 py-2 font-medium text-white outline-none hover:opacity-80 focus:ring">Search</button>
                        </div>
                    </form>
                </div>
            </div>
            {{-- --------------------------------End Filter section--------------------------------  --}}

        </div>
        {{-- --------------------------------Artisans Data section--------------------------------  --}}

        <div class="bg-white font-[sans-serif] p-4">
            <div class="max-w-6xl md:max-w-full mx-auto md:px-12">
                <div class="w-full text-center ">
                    <h2 class="text-3xl font-extrabold text-[#333]  inline-block">Artisans</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-20 mt-10">

                    @foreach ($artisans as $artisan)
                        <div
                            class="flex max-lg:flex-col bg-white cursor-pointer rounded overflow-hidden shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)]  transition-all duration-300">
                            <img src="{{ asset('storage/image/' . $artisan->user->Profil) }}" alt="Blog Post 2"
                                class="lg:w-2/5 min-h-[250px] h-full object-cover" />
                            <div class="p-6 lg:w-3/5">
                                <h3 class="text-xl font-bold text-[#333]">
                                    @foreach ($artisan->artisanJobs as $artisanJob)
                                        {{ $artisanJob->job->name }}
                                    @endforeach
                                </h3>
                                <span class="text-sm block text-gray-400 mt-2"> {{ $artisan->user->lname }}
                                    {{ $artisan->user->fname }} </span>
                                <div class="flex flex-col">
                                    @foreach ($artisan->competences as $artisanCompetence)
                                        <p class="text-sm mt-4">
                                            {{ $artisanCompetence->name }}
                                        </p>
                                    @endforeach
                                </div>
                                <div
                                    class="flex w-full gap-2 justify-center md:h-[6vh] font-bold items-center mb-4 md:justify-start">
                                    <p> {{ $artisan->availablity }}</p>


                                    {{-- ----------------------- Condition For Dispo icon -------------------- --}}


                                    @if ($artisan->availablity === 'Available')
                                        <img srcset="https://img.icons8.com/?size=48&amp;id=FkQHNSmqWQWH&amp;format=png 1x, https://img.icons8.com/?size=96&amp;id=FkQHNSmqWQWH&amp;format=png 2x,"
                                            src="https://img.icons8.com/?size=96&amp;id=FkQHNSmqWQWH&amp;format=png"
                                            alt="emoji-cercle-vert" loading="lazy" width="20" height="20"
                                            style="width: 15px; height: 15px; " lazy="loaded" class="animate-pulse">
                                    @endif

                                    {{-- --------------------- Condition For Dispo icon ---------------------- --}}

                                </div>
                                
                                <div class="flex gap-2 items-center justify-between mt-4">
                                  <form action="/Profile" method="Post">  <input type="hidden" value="{{$artisan->user->id}}" name="artisan_id"> <button type="submit" class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">Read More</button></form>
                                  <form action="/Reserve" method="post"> @csrf <input type="hidden" value="{{$artisan->user->id}}" name="artisan_id"> <button type="submit" class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">Resrve</button></form>

                                    
                                    </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        {{-- --------------------------------End Artisans Data section--------------------------------  --}}
    @endsection


    <script>
        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
        }
    </script>
</body>

</html>
