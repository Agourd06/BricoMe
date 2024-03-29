<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>BricolMe Reporting</title>
</head>

<body>

        @extends('layouts.ClientSideBar')
        @section('content')
            <div class="isolate bg-white sm:py-20 ">
              @if (session('success'))
              <div id="success-message" class="bg-green-600 rounded-md  fixed right-20  top-50 z-50 text-white p-4 text-center animate-bounce mb-4">
                  {{ session('success') }}
              </div>

              <script>
                  setTimeout(function() {
                      document.getElementById('success-message').style.display = 'none';
                  }, 5000);
              </script>
          @endif
                <div class="absolute inset-x-0 top-[-5rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]"
                    aria-hidden="true">
                    <div class="relative left-1/2 -z-10 aspect-[1155/678] w-[36.125rem] max-w-none -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#3554AD] to-[#F9B100] opacity-30 sm:left-[calc(50%-40rem)] sm:w-[72.1875rem]"
                        style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                    </div>
                 
                </div>
                <div class="mx-auto max-w-2xl text-center">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Contact sales</h2>
                    <p class="mt-2 text-lg leading-8 text-gray-600">Aute magna irure deserunt veniam aliqua magna enim
                        voluptate.</p>
                </div>

                <form action="/repport" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20">
                    @csrf
                    <div class="text-red-500 text-[20px] w-full text-center">
                        @if ($errors->any())
                            <div>{{ $errors->first() }}</div>
                        @endif
                    </div>
                    <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                        <div>
                            <label for="first-name" class="block text-sm font-semibold leading-6 text-gray-900">First
                                name</label>
                            <div class="mt-2.5">
                                <input type="text" name="fname" id="first-name" autocomplete="given-name" value="{{$clientData->user->lname}}" readonly
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div>
                            <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900">Last
                                name</label>
                            <div class="mt-2.5">
                                <input type="text" name="lname" id="last-name" autocomplete="family-name" value="{{$clientData->user->fname}}" readonly
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        @if($artisanData !== null)
                        <div class="sm:col-span-2">
                            <label for="email" class="block text-sm font-semibold leading-6 text-gray-900">Artisan</label>
                            <div class="mt-2.5">
                                <input type="artisan" name="artisanName" id="artisan" autocomplete="artisan" value="{{$artisanData ? $artisanData->user->lname : ''}} {{$artisanData ? $artisanData->user->fname : ''}}" readonly
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                             </div>
                        </div>
                        @else
                        <div class="sm:col-span-2">
                            <label for="email" class="block text-sm font-semibold leading-6 text-gray-900">Artisan</label>

                            <select type="text" name="artisanName" id="area"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            @foreach ($artisans as $artisan)
                                    <option value="{{ $artisan->user->lname }} {{ $artisan->user->fname}}">{{ $artisan->user->lname }} {{ $artisan->user->fname}}</option>
                                @endforeach
                            </select>
                            <div  class="mt-2"><p>You Can Found the exact Artisan in Reservation Page and report him easly</p></div>
                        </div>
                        @endif
                        <div class="sm:col-span-2">
                            <label for="email" class="block text-sm font-semibold leading-6 text-gray-900">Email</label>
                            <div class="mt-2.5">
                                <input type="email" name="email" id="email" autocomplete="email"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="message"
                                class="block text-sm font-semibold leading-6 text-gray-900">Message</label>
                            <div class="mt-2.5">
                                <textarea name="message" id="message" rows="4"
                                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="mt-10">
                        <button type="submit"
                            class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Let's
                            talk</button>
                    </div>
                </form>
            </div>
        @endsection
    
</body>

</html>