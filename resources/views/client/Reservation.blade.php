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
                @foreach($reservations as $reservation)

                <div class="bg-white max-w-md ml-4  p-6 rounded-lg shadow-md ">
                    <h2 class="text-center text-2xl font-extrabold mb-2 text-red-600">Reservation</h2>

                    <div class="text-center mb-2">
                        <label class="text-gray-700 font-bold text-sm">Artisan's Name:</label>
                        <p class="text-gray-800 font-normal">{{$reservation->artisanName}}</p>
                    </div>

                    <div class="flex flex-col mb-2">
                        <label class="text-gray-700 font-bold text-sm">Address:</label>
                        <p class="text-gray-800 font-normal">{{$reservation->adress}}</p>
                    </div>

                    <div class="flex justify-between mb-2">
                        <div class="flex flex-col mr-2">
                            <label class="text-gray-700 font-bold text-sm">Job:</label>
                            <p class="text-gray-800 font-normal">{{$reservation->Job->name}}</p>
                        </div>

                        <div class="flex flex-col ml-4">
                            <label class="text-gray-700 font-bold text-sm">Skills:</label>
                            <p class="text-gray-800 font-normal">{{$reservation->Competece->name}}</p>
                        </div>
                    </div>

                    <div class="flex flex-col mb-2">
                        <label class="text-gray-700 font-bold text-sm">Tarif</label>
                        <p class="text-gray-800 font-normal">{{$reservation->price}} DH</p>
                    </div>

                    <div class="flex justify-between mb-2">
                        <div class="flex flex-col pr-2">
                            <label class="text-gray-700 font-bold text-sm">Date of Creation:</label>
                            <p class="text-gray-800 font-normal">{{$reservation->created_at}}</p>
                        </div>

                        <div class="flex flex-col pr-2 ml-12">
                            <label class="text-gray-700 font-bold text-sm">Date of Reservation:</label>
                            <p class="text-gray-800 font-normal">{{$reservation->updated_at}}</p>
                        </div>
                    </div>

                    <div class="flex justify-center">
                        <button
                            class="mt-4 bg-red-600 text-white px-3 py-1 rounded hover:bg-red-800 focus:outline-none focus:shadow-outline-red active:bg-red-800">
                            Cancel Reservation
                        </button>
                    </div>
                </div>
                @endforeach
{{--             --}}
{{--                <div class="bg-white max-w-md ml-4  p-6 rounded-lg shadow-md ">--}}
{{--                  <h2 class="text-center text-2xl font-extrabold mb-2 text-red-600">Reservation</h2>--}}

{{--                  <div class="flex flex-col mb-2">--}}
{{--                      <label class="text-gray-700 font-bold text-sm">Artisan's Name:</label>--}}
{{--                      <p class="text-gray-800 font-normal">John Doe</p>--}}
{{--                  </div>--}}

{{--                  <div class="flex flex-col mb-2">--}}
{{--                      <label class="text-gray-700 font-bold text-sm">Address:</label>--}}
{{--                      <p class="text-gray-800 font-normal">123 Artisan Street, Cityville</p>--}}
{{--                  </div>--}}

{{--                  <div class="flex justify-between mb-2">--}}
{{--                      <div class="flex flex-col mr-2">--}}
{{--                          <label class="text-gray-700 font-bold text-sm">Job:</label>--}}
{{--                          <p class="text-gray-800 font-normal">Artisan / Craftsperson</p>--}}
{{--                      </div>--}}

{{--                      <div class="flex flex-col ml-4">--}}
{{--                          <label class="text-gray-700 font-bold text-sm">Skills:</label>--}}
{{--                          <p class="text-gray-800 font-normal">#Skill1 #Skill2 #Skill3</p>--}}
{{--                      </div>--}}
{{--                  </div>--}}

{{--                  <div class="flex flex-col mb-2">--}}
{{--                      <label class="text-gray-700 font-bold text-sm">Hourly Rate:</label>--}}
{{--                      <p class="text-gray-800 font-normal">$50/hour</p>--}}
{{--                  </div>--}}

{{--                  <div class="flex justify-between mb-2">--}}
{{--                      <div class="flex flex-col pr-2">--}}
{{--                          <label class="text-gray-700 font-bold text-sm">Date of Creation:</label>--}}
{{--                          <p class="text-gray-800 font-normal">February 1, 2024</p>--}}
{{--                      </div>--}}

{{--                      <div class="flex flex-col pr-2 ml-12">--}}
{{--                          <label class="text-gray-700 font-bold text-sm">Date of Reservation:</label>--}}
{{--                          <p class="text-gray-800 font-normal">March 1, 2024</p>--}}
{{--                      </div>--}}
{{--                  </div>--}}

{{--                  <div class="flex justify-center">--}}
{{--                      <button--}}
{{--                          class="mt-4 bg-red-600 text-white px-3 py-1 rounded hover:bg-red-800 focus:outline-none focus:shadow-outline-red active:bg-red-800">--}}
{{--                          Cancel Reservation--}}
{{--                      </button>--}}
{{--                  </div>--}}
{{--              </div>--}}
{{--              <div class="bg-white max-w-md ml-4  p-6 rounded-lg shadow-md ">--}}
{{--                <h2 class="text-center text-2xl font-extrabold mb-2 text-red-600">Reservation</h2>--}}

{{--                <div class="flex flex-col mb-2">--}}
{{--                    <label class="text-gray-700 font-bold text-sm">Artisan's Name:</label>--}}
{{--                    <p class="text-gray-800 font-normal">John Doe</p>--}}
{{--                </div>--}}

{{--                <div class="flex flex-col mb-2">--}}
{{--                    <label class="text-gray-700 font-bold text-sm">Address:</label>--}}
{{--                    <p class="text-gray-800 font-normal">123 Artisan Street, Cityville</p>--}}
{{--                </div>--}}

{{--                <div class="flex justify-between mb-2">--}}
{{--                    <div class="flex flex-col mr-2">--}}
{{--                        <label class="text-gray-700 font-bold text-sm">Job:</label>--}}
{{--                        <p class="text-gray-800 font-normal">Artisan / Craftsperson</p>--}}
{{--                    </div>--}}

{{--                    <div class="flex flex-col ml-4">--}}
{{--                        <label class="text-gray-700 font-bold text-sm">Skills:</label>--}}
{{--                        <p class="text-gray-800 font-normal">#Skill1 #Skill2 #Skill3</p>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="flex flex-col mb-2">--}}
{{--                    <label class="text-gray-700 font-bold text-sm">Hourly Rate:</label>--}}
{{--                    <p class="text-gray-800 font-normal">$50/hour</p>--}}
{{--                </div>--}}

{{--                <div class="flex justify-between mb-2">--}}
{{--                    <div class="flex flex-col pr-2">--}}
{{--                        <label class="text-gray-700 font-bold text-sm">Date of Creation:</label>--}}
{{--                        <p class="text-gray-800 font-normal">February 1, 2024</p>--}}
{{--                    </div>--}}

{{--                    <div class="flex flex-col pr-2 ml-12">--}}
{{--                        <label class="text-gray-700 font-bold text-sm">Date of Reservation:</label>--}}
{{--                        <p class="text-gray-800 font-normal">March 1, 2024</p>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="flex justify-center">--}}
{{--                    <button--}}
{{--                        class="mt-4 bg-red-600 text-white px-3 py-1 rounded hover:bg-red-800 focus:outline-none focus:shadow-outline-red active:bg-red-800">--}}
{{--                        Cancel Reservation--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="bg-white max-w-md ml-4  p-6 rounded-lg shadow-md">--}}
{{--              <h2 class="text-center text-2xl font-extrabold mb-2 text-red-600">Reservation</h2>--}}

{{--              <div class="flex flex-col mb-2">--}}
{{--                  <label class="text-gray-700 font-bold text-sm">Artisan's Name:</label>--}}
{{--                  <p class="text-gray-800 font-normal">John Doe</p>--}}
{{--              </div>--}}

{{--              <div class="flex flex-col mb-2">--}}
{{--                  <label class="text-gray-700 font-bold text-sm">Address:</label>--}}
{{--                  <p class="text-gray-800 font-normal">123 Artisan Street, Cityville</p>--}}
{{--              </div>--}}

{{--              <div class="flex justify-between mb-2">--}}
{{--                  <div class="flex flex-col mr-2">--}}
{{--                      <label class="text-gray-700 font-bold text-sm">Job:</label>--}}
{{--                      <p class="text-gray-800 font-normal">Artisan / Craftsperson</p>--}}
{{--                  </div>--}}

{{--                  <div class="flex flex-col ml-4">--}}
{{--                      <label class="text-gray-700 font-bold text-sm">Skills:</label>--}}
{{--                      <p class="text-gray-800 font-normal">#Skill1 #Skill2 #Skill3</p>--}}
{{--                  </div>--}}
{{--              </div>--}}

{{--              <div class="flex flex-col mb-2">--}}
{{--                  <label class="text-gray-700 font-bold text-sm">Hourly Rate:</label>--}}
{{--                  <p class="text-gray-800 font-normal">$50/hour</p>--}}
{{--              </div>--}}

{{--              <div class="flex justify-between mb-2">--}}
{{--                  <div class="flex flex-col pr-2">--}}
{{--                      <label class="text-gray-700 font-bold text-sm">Date of Creation:</label>--}}
{{--                      <p class="text-gray-800 font-normal">February 1, 2024</p>--}}
{{--                  </div>--}}

{{--                  <div class="flex flex-col pr-2 ml-12">--}}
{{--                      <label class="text-gray-700 font-bold text-sm">Date of Reservation:</label>--}}
{{--                      <p class="text-gray-800 font-normal">March 1, 2024</p>--}}
{{--                  </div>--}}
{{--              </div>--}}

{{--              <div class="flex justify-center">--}}
{{--                  <button--}}
{{--                      class="mt-4 bg-red-600 text-white px-3 py-1 rounded hover:bg-red-800 focus:outline-none focus:shadow-outline-red active:bg-red-800">--}}
{{--                      Cancel Reservation--}}
{{--                  </button>--}}
{{--              </div>--}}
          </div>
            </div>
        </section>
    @endsection
</body>

</html>
