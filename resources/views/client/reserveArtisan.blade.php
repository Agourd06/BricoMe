<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <title>Document</title>
</head>

<body>
    @extends('layouts/ClientSideBar')

    @section('Reserve')
        <div class="flex items-center justify-center p-12">
            <!-- Author: FormBold Team -->
            <div class="mx-auto w-full max-w-[550px] bg-white">
                <form>
                    <div class="-mx-3 grid grid-cols-2">

                        <div class="w-full px-3 ">
                            <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                                Artisan First Name :
                            </label>
                            <div class="mb-5">
                                <input type="text" name="" id="area"
                                    value="{{ $ArtisanData ? $ArtisanData->user->fname : '' }}" readonly
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                        </div>
                        <div class="w-full px-3 ">
                            <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                                Artisan Last Name :
                            </label>
                            <div class="mb-5">
                                <input type="text" id="city"
                                    value="{{ $ArtisanData ? $ArtisanData->user->lname : '' }}" readonly
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                        </div>
                    </div>

                    <div class="mb-5">
                        <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                            Your Adress :
                        </label>
                        <input type="text" name="adress" id="name" placeholder="Enter Your Adress Here ..."
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="-mx-3 grid grid-cols-2">

                        <div class="w-full px-3 ">
                            <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                                Booked Job :
                            </label>
                            <div class="mb-5">
                                <select type="text" name="Job" id="area"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                                    @foreach ($ArtisanData->artisanJobs as $artisanJob)
                                        <option value="{{ $artisanJob->job->id }}" >{{ $artisanJob->job->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="w-full px-3 ">
                            <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                                Booked Skill :
                            </label>
                            <div class="mb-5">
                                <select type="text" name="Skill" id="skill"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                                    @foreach ($ArtisanData->competences as $artisanCompetence)
                                    <option class="text-sm mt-4" value="{{ $artisanCompetence->id }}" data-tarif="{{ $artisanCompetence->pivot->tarif }}">
                                        {{ $artisanCompetence->name }}
                                    </option>
                                @endforeach
                                
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="mb-5">
                        <label for="date" class="mb-3 block text-base font-medium text-[#07074D]">
                            Booking Date :
                        </label>
                        <input name="date" type="datetime-local"
                            min="{{ now()->timezone('Africa/Casablanca')->format('Y-m-d\TH:i') }}"
                            max="{{ now()->timezone('Africa/Casablanca')->addMonth()->format('Y-m-d\TH:i') }}"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>

                    <div class="-mx-3 grid grid-cols-2">

                        <div class="w-full px-3 ">
                            <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                                City :
                            </label>
                            <div class="mb-5">
                                <input type="text" name="City" id="area"
                                    value="{{ $ArtisanData ? $ArtisanData->user->city : '' }}" readonly
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                        </div>
                        <div class="w-full px-3 ">
                            <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                                Price :
                            </label>
                            <div class="mb-5">
                               
                                <input type="text" name="price" id="price" readonly
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                            
                        </div>
                    </div>

                    <div>
                        <button
                            class="hover:shadow-form w-full rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none">
                            Book Appointment
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
    <script>
   $(document).ready(function () {
    var skillsDropdown = $('#skill');
    var priceInput = $('#price');

    skillsDropdown.change(function () {
        var selectedSkillPrice = $(this).find(':selected').data('tarif');
        priceInput.val(selectedSkillPrice);
    });
});

    </script>
    





</body>

</html>
