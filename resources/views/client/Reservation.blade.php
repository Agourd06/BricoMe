@php
    use Carbon\Carbon;
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Artisan Card</title>
</head>

<body>
    @extends('layouts/ClientSideBar')

    @section('Reservation')
        <section class="min-screen w-full p-4">
            <h1 class="text-4xl font-extrabold text-center mb-8 text-red-600">LIST OF RESERVATIONS</h1>
            <div class="flex flex-wrap gap-4 px-8">
                @foreach ($reservations as $reservation)
                    <div class="bg-white max-w-md ml-4  p-6 rounded-lg shadow-md ">
                        <h2 class="text-center text-2xl font-extrabold mb-2 text-red-600">Reservation</h2>

                        <div class="text-center mb-2">
                            <label class="text-gray-700 font-bold text-sm">Artisan's Name:</label>
                            <p class="text-gray-800 font-normal">{{ $reservation->artisanName }}</p>
                        </div>

                        <div class="flex flex-col mb-2">
                            <label class="text-gray-700 font-bold text-sm">Address:</label>
                            <p class="text-gray-800 font-normal">{{ $reservation->adress }}</p>
                        </div>

                        <div class="flex justify-between mb-2">
                            <div class="flex flex-col mr-2">
                                <label class="text-gray-700 font-bold text-sm">Job:</label>
                                <p class="text-gray-800 font-normal">{{ $reservation->Job->name }}</p>
                            </div>

                            <div class="flex flex-col ml-4">
                                <label class="text-gray-700 font-bold text-sm">Skills:</label>
                                <p class="text-gray-800 font-normal">{{ $reservation->Competece->name }}</p>
                            </div>
                        </div>

                        <div class="flex flex-col mb-2">
                            <label class="text-gray-700 font-bold text-sm">Tarif</label>
                            <p class="text-gray-800 font-normal">{{ $reservation->price }} DH</p>
                        </div>

                        <div class="flex justify-between mb-2">
                            <div class="flex flex-col pr-2">
                                <label class="text-gray-700 font-bold text-sm">Date of Creation:</label>
                                <p class="text-gray-800 font-normal">{{ $reservation->created_at }}</p>
                            </div>

                            <div class="flex flex-col pr-2 ml-12">
                                <label class="text-gray-700 font-bold text-sm">Date of Reservation:</label>
                                <p class="text-gray-800 font-normal">{{ $reservation->updated_at }}</p>
                            </div>
                        </div>
                        @php
                            $createdAt = $reservation->date;
                            $currentTime = Carbon::now();
                            $differenceInHours = $currentTime->diffInHours($createdAt);
                        @endphp
                    <div>
                      @if ($differenceInHours > 0)
                          <div class="flex justify-center">
                              <button class="mt-4 bg-red-600 text-white px-3 py-1 rounded hover:bg-red-800 focus:outline-none focus:shadow-outline-red active:bg-red-800">
                                  Cancel Reservation
                              </button>
                          </div>
                      @elseif ($differenceInHours === 0)
                          <div class="flex justify-between items-center bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative" >
                              <div>
                                  <h1 class="font-bold">Thank You for Reviewing!</h1>
                              </div>
                              <div class="flex items-center">
                                  <button onclick="toggleModal('rating')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                                      Review
                                  </button>
                              </div>
                          </div>
                      @endif
                  </div>

                    </div>
                @endforeach

            </div>
            </div>
        </section>
    @endsection
     <!-- rating form -->
     <div id="rating" class="fixed z-50 hidden h-screen top-0 right-0 bottom-0 left-0 bg-gray-200">
        <div class="rounded-2xl flex flex-col mx-auto items-center justify-center bg-white  shadow-xl mt-56 mx-8 mb-4 max-w-lg">
            <div class="rating flex flex-row justify-center rounded-3xl pt-5">
                <svg class="h-12 transition-all duration-100 fill-gray-400  fill-yellow-200  cursor-pointer"
                    viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" data-value="1">

                    <path
                        d="M575.852903 115.426402L661.092435 288.054362c10.130509 20.465674 29.675227 34.689317 52.289797 37.963825l190.433097 27.62866c56.996902 8.288598 79.7138 78.281203 38.475467 118.496253l-137.836314 134.35715c-16.372539 15.963226-23.84251 38.987109-19.954032 61.49935l32.540421 189.716799c9.721195 56.792245-49.833916 100.077146-100.793444 73.267113L545.870691 841.446188a69.491196 69.491196 0 0 0-64.67153 0l-170.376737 89.537324c-50.959528 26.810033-110.51464-16.474868-100.793444-73.267113L242.569401 667.9996c3.888478-22.512241-3.581493-45.536125-19.954032-61.49935L84.779055 472.245428c-41.238333-40.215049-18.521435-110.207655 38.475467-118.496252l190.433097-27.62866c22.61457-3.274508 42.159288-17.498151 52.289797-37.963826L451.319277 115.426402c25.479764-51.675827 99.053862-51.675827 124.533626 0z">
                    </path>
                </svg>

                <svg class="h-12 transition-all duration-100 fill-gray-400  cursor-pointer" viewBox="0 0 1024 1024"
                    version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" data-value="2">

                    <path
                        d="M575.852903 115.426402L661.092435 288.054362c10.130509 20.465674 29.675227 34.689317 52.289797 37.963825l190.433097 27.62866c56.996902 8.288598 79.7138 78.281203 38.475467 118.496253l-137.836314 134.35715c-16.372539 15.963226-23.84251 38.987109-19.954032 61.49935l32.540421 189.716799c9.721195 56.792245-49.833916 100.077146-100.793444 73.267113L545.870691 841.446188a69.491196 69.491196 0 0 0-64.67153 0l-170.376737 89.537324c-50.959528 26.810033-110.51464-16.474868-100.793444-73.267113L242.569401 667.9996c3.888478-22.512241-3.581493-45.536125-19.954032-61.49935L84.779055 472.245428c-41.238333-40.215049-18.521435-110.207655 38.475467-118.496252l190.433097-27.62866c22.61457-3.274508 42.159288-17.498151 52.289797-37.963826L451.319277 115.426402c25.479764-51.675827 99.053862-51.675827 124.533626 0z">
                    </path>
                </svg>

                <svg class="h-12 transition-all duration-100 fill-gray-400  cursor-pointer" viewBox="0 0 1024 1024"
                    version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" data-value="3">

                    <path
                        d="M575.852903 115.426402L661.092435 288.054362c10.130509 20.465674 29.675227 34.689317 52.289797 37.963825l190.433097 27.62866c56.996902 8.288598 79.7138 78.281203 38.475467 118.496253l-137.836314 134.35715c-16.372539 15.963226-23.84251 38.987109-19.954032 61.49935l32.540421 189.716799c9.721195 56.792245-49.833916 100.077146-100.793444 73.267113L545.870691 841.446188a69.491196 69.491196 0 0 0-64.67153 0l-170.376737 89.537324c-50.959528 26.810033-110.51464-16.474868-100.793444-73.267113L242.569401 667.9996c3.888478-22.512241-3.581493-45.536125-19.954032-61.49935L84.779055 472.245428c-41.238333-40.215049-18.521435-110.207655 38.475467-118.496252l190.433097-27.62866c22.61457-3.274508 42.159288-17.498151 52.289797-37.963826L451.319277 115.426402c25.479764-51.675827 99.053862-51.675827 124.533626 0z">
                    </path>
                </svg>

                <svg class="h-12 transition-all duration-100 fill-gray-400  cursor-pointer" viewBox="0 0 1024 1024"
                    version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" data-value="4">

                    <path
                        d="M575.852903 115.426402L661.092435 288.054362c10.130509 20.465674 29.675227 34.689317 52.289797 37.963825l190.433097 27.62866c56.996902 8.288598 79.7138 78.281203 38.475467 118.496253l-137.836314 134.35715c-16.372539 15.963226-23.84251 38.987109-19.954032 61.49935l32.540421 189.716799c9.721195 56.792245-49.833916 100.077146-100.793444 73.267113L545.870691 841.446188a69.491196 69.491196 0 0 0-64.67153 0l-170.376737 89.537324c-50.959528 26.810033-110.51464-16.474868-100.793444-73.267113L242.569401 667.9996c3.888478-22.512241-3.581493-45.536125-19.954032-61.49935L84.779055 472.245428c-41.238333-40.215049-18.521435-110.207655 38.475467-118.496252l190.433097-27.62866c22.61457-3.274508 42.159288-17.498151 52.289797-37.963826L451.319277 115.426402c25.479764-51.675827 99.053862-51.675827 124.533626 0z">
                    </path>
                </svg>

                <svg class="h-12 transition-all duration-100 fill-gray-400  cursor-pointer" viewBox="0 0 1024 1024"
                    version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" data-value="5">

                    <path
                        d="M575.852903 115.426402L661.092435 288.054362c10.130509 20.465674 29.675227 34.689317 52.289797 37.963825l190.433097 27.62866c56.996902 8.288598 79.7138 78.281203 38.475467 118.496253l-137.836314 134.35715c-16.372539 15.963226-23.84251 38.987109-19.954032 61.49935l32.540421 189.716799c9.721195 56.792245-49.833916 100.077146-100.793444 73.267113L545.870691 841.446188a69.491196 69.491196 0 0 0-64.67153 0l-170.376737 89.537324c-50.959528 26.810033-110.51464-16.474868-100.793444-73.267113L242.569401 667.9996c3.888478-22.512241-3.581493-45.536125-19.954032-61.49935L84.779055 472.245428c-41.238333-40.215049-18.521435-110.207655 38.475467-118.496252l190.433097-27.62866c22.61457-3.274508 42.159288-17.498151 52.289797-37.963826L451.319277 115.426402c25.479764-51.675827 99.053862-51.675827 124.533626 0z">
                    </path>
                </svg>
            </div>

            <form class="w-full max-w-xl bg-white rounded-3xl px-4 pt-2">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <h2 class="px-4 pt-3 text-gray-700 text-lg">Add your comment</h2>
                    <div class="w-full md:w-full px-3 mb-2 mt-2">
                        <textarea
                            class="bg-gray-100 rounded-xl border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
                            name="body" placeholder='Comment...' required></textarea>
                    </div>

                    <div class="w-full md:w-full flex items-start md:w-full px-3">
                        <div class="-mr-1">
                            <input type='submit'
                                class="bg-blue-500 text-white font-medium py-1 px-4 border cursor-pointer rounded-xl tracking-wide mr-1 hover:bg-blue-800"
                                value='submit'>
                            <input type='button' onclick="toggleModal('rating')"
                                class="bg-black text-white font-medium cursor-pointer py-1 px-4 border rounded-xl tracking-wide mr-1 hover:bg-gray-800"
                                value='Close'>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <script>
        const svgs = document.querySelector('.rating').children;
        for (let i = 0; i < svgs.length; i++) {
            svgs[i].onclick = () => {
                for (let j = 0; j <= i; j++) {
                    svgs[j].classList.add("fill-yellow-200");
                }
                for (let k = i + 1; k < svgs.length; k++) {
                    svgs[k].classList.remove("fill-yellow-200");
                }
            }
        }

        function toggleModal(modalId) {
                const modal = document.getElementById(modalId);
                modal.classList.toggle('hidden');
            }


    </script>
</body>

</html>
