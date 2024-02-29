<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>BricolMe Profile</title>
</head>

<body>
    <div class="flex items-center  top-0  justify-between p-4 bg-white z-50 h-20 w-full shadow-md">
        <a href='/Client' class="max-md:mx-auto "><img
            src="{{ asset('storage/image/' . 'logo.png') }}" alt="logo"
            class='w-44 inline-block' /></a>            <i class='bx bx-menu-alt-right text-[40px] lg:hidden' onclick="toggleModal('sidebar')"></i>

    </div>
    <div class="px-16 pb-16 pt-8">
        <a href="/Client"><i class='bx bx-arrow-back text-3xl hover:animate-ping duration-300'
                style='color:#272525'></i></a>
        <div class="p-8 bg-white shadow mt-24">
            <div class="grid grid-cols-1 md:grid-cols-3">
                <div class="grid grid-cols-3 text-center order-last md:order-first mt-20 md:mt-0">
                    <div>
                        <p class="font-bold text-gray-700 text-xl">{{ $reservations }}</p>
                        <p class="text-gray-400">Reservations</p>
                    </div>
                    <div>
                        <p class="font-bold text-gray-700 text-xl">{{ $images }}</p>
                        <p class="text-gray-400">Photos</p>
                    </div>
                    <div>
                        <p class="font-bold text-gray-700 text-xl">{{ $comments }}</p>
                        <p class="text-gray-400">Comments</p>
                    </div>
                </div>
                <div class="relative">
                    <div
                        class="w-48 h-48 bg-indigo-100 mx-auto rounded-full shadow-2xl absolute inset-x-0 top-0 -mt-24 flex items-center justify-center text-indigo-500">
                        <img src="{{ asset('storage/image/' . $artisan->user->Profil) }}" alt=""
                            class="h-full w-full rounded-full">
                    </div>

                </div>
                <div class="space-x-8 flex justify-between mt-32 md:mt-0 md:justify-center">
                    <form action="/Reserve" method="post"> @csrf <input type="hidden" value="{{ $artisan->user->id }}"
                            name="artisan_id"> <button
                            class="text-white py-4 px-4 uppercase rounded bg-gray-700 hover:bg-gray-800 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5">
                            Reserve</button></form>
                </div>

            </div>
            <div class="mt-20 text-center border-b pb-12">
                <h1 class="text-4xl font-medium text-gray-700">{{ $artisan->user->lname }} {{ $artisan->user->fname }},
                    <span class="font-light text-lg text-gray-500">Birth : {{ $artisan->user->birthDay }}</span>
                </h1>
                <div class="flex gap-4  justify-center items-center">
                    <p class=" text-gray-600 mt-3 font-bold">City : </p>
                    <p class="font-light text-gray-600 mt-3"> {{ $artisan->user->city }}</p>
                </div>
                <div class="flex mt-8 flex-wrap gap-4 justify-center items-center">

                    <p class="mt-2 text-gray-500 font-bold"> Jobs : </p>
                    @foreach ($artisan->artisanJobs as $artisanJob)
                        <p class="mt-2 text-gray-500">
                            {{ $artisanJob->job->name }}
                        </p>
                    @endforeach
                </div>
                <div class="flex mt-8 flex-wrap gap-4 justify-center items-center">
                    <p class="text-gray-500 font-bold"> Competences :
                    <p></p>
                    @foreach ($artisan->competences as $artisanCompetence)
                        <p class="text-gray-500"> {{ $artisanCompetence->name }} /</p>
                    @endforeach
                    </p>
                </div>
            </div>


            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                @foreach ($imagesArtisan as $imageArtisan)
                    <div>
                        <img class="h-full max-w-full rounded-lg"
                            src="{{ asset('storage/image/' . $imageArtisan->image) }}" alt="">
                    </div>
                @endforeach
            </div>

            <div class="mt-12 flex flex-col justify-center">
                <p class="text-gray-600 text-center font-light lg:px-16">
                    A skilled bricoleur, Ryan, known by Melbourne roots and now based in Brooklyn as Nick Murphy,
                    engages in the art of crafting, assembling, and recording all aspects of their music. This hands-on
                    approach infuses their work with a distinct, intimate ambiance, complemented by a robust and
                    rhythmic structure. Much like a bricoleur, Ryan is an artisan of considerable range, weaving
                    together various elements to create a unique and compelling artistic tapestry.</p>
            </div>
        </div>
    </div>
</body>

</html>
