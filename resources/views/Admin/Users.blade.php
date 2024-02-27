<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>BricoleMe</title>

</head>




<body class="text-gray-800 font-inter">
    <section class="w-full   bg-gray-50 min-h-screen transition-all main">
        @include('layouts/admineNav')

        <div class="mt-8 bg-white p-4 shadow rounded-lg mx-auto min-h-1/2">

            <h2 class="text-gray-500 text-lg font-semibold pb-4">Artisans</h2>
            <div class="my-1"></div>
            <div class="bg-gradient-to-r from-sky-100 to-sky-900 h-px mb-6"></div>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white font-[sans-serif]">
                    <thead class="bg-gradient-to-r from-[#3554AD] to-[#F9B100] whitespace-nowrap">
                        <tr>

                            <th
                                class="px-6 py-3 text-left max-w-4  md:text-[15px] text-[12px] font-semibold text-white">
                                Profile
                            </th>
                            <th class="px-6 py-3 text-left md:text-[15px] text-[12px] font-semibold text-white">
                                FullName
                            </th>
                            <th class="px-6 py-3 text-left md:text-[15px] text-[12px] font-semibold text-white">
                                Phone
                            </th>
                            <th class="px-6 py-3 text-left md:text-[15px] text-[12px] font-semibold text-white">
                                E-mail
                            </th>
                            <th class="px-6 py-3 text-left md:text-[15px] text-[12px] font-semibold text-white">
                                Job
                            </th>
                            <th class="px-6 py-3 text-left md:text-[15px] text-[12px] font-semibold text-white">
                                Action
                            </th>
                            <th class="px-6 py-3 text-left md:text-[15px] text-[12px] font-semibold text-white">
                                ban
                            </th>
                        </tr>
                    </thead>
                    <tbody class="whitespace-nowrap">
                        @foreach ($artisans as $artisan)
                            <tr class="even:bg-blue-50">
                                <td class="md:text-[15px] max-w-1  text-[12px]">
                                    <img class="w-full" src="{{ asset('storage/image/' . $artisan->user->Profil) }}"
                                        alt="">

                                </td>
                                <td class="pl-10 py-4 md:text-[15px] text-[12px]">
                                    {{ $artisan->user->lname }} {{ $artisan->user->fname }}
                                </td>
                                <td class="pl-4 py-4 md:text-[15px] text-[12px]">
                                    {{ $artisan->user->Phone }}
                                </td>


                                <td class="  md:text-[15px] text-left pl-8 text-[12px] ">
                                    {{ $artisan->user->email }}

                                </td>
                                <td class="  md:text-[15px] text-left pl-8 text-[12px]">
                                    @foreach ($artisan->artisanJobs as $artisanJob)
                                        {{$artisanJob->job->name }}
                                    @endforeach
                                </td>

                                <td class="pl-4 pt-8 flex">
                                    <form action="/archiveUser" method="post">
                                        @csrf
                                        <input type="hidden" name="UserId" value="">
                                        <input type="hidden" name="archiveUs" value="1">
                                        <input type="hidden" name="role" value="passager">
                                        <button class="mr-4" title="archive" name="archive" value="">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24" fill="red"
                                                viewBox="0 -960 960 960" width="24">
                                                <path
                                                    d="m480-240 160-160-56-56-64 64v-168h-80v168l-64-64-56 56 160 160ZM200-640v440h560v-440H200Zm0 520q-33 0-56.5-23.5T120-200v-499q0-14 4.5-27t13.5-24l50-61q11-14 27.5-21.5T250-840h460q18 0 34.5 7.5T772-811l50 61q9 11 13.5 24t4.5 27v499q0 33-23.5 56.5T760-120H200Zm16-600h528l-34-40H250l-34 40Zm264 300Z" />
                                            </svg>
                                        </button>


                                    </form>
                                    <form action="/archiveUser" method="post">
                                        @csrf
                                        <input type="hidden" name="UserId" value="">
                                        <input type="hidden" name="archiveUs" value="0">
                                        <input type="hidden" name="role" value="passager">

                                        <button class="mr-4" title="archive" name="unarchive" value="">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24" fill="green"
                                                viewBox="0 -960 960 960" width="24">
                                                <path
                                                    d="M480-560 320-400l56 56 64-64v168h80v-168l64 64 56-56-160-160Zm-280-80v440h560v-440H200Zm0 520q-33 0-56.5-23.5T120-200v-499q0-14 4.5-27t13.5-24l50-61q11-14 27.5-21.5T250-840h460q18 0 34.5 7.5T772-811l50 61q9 11 13.5 24t4.5 27v499q0 33-23.5 56.5T760-120H200Zm16-600h528l-34-40H250l-34 40Zm264 300Z" />
                                            </svg>

                                        </button>
                                    </form>
                                </td>
                                <td class="pl-8 pt-8 ">
                                    <form action="/archiveUser" method="post">
                                        @csrf
                                        <input type="hidden" name="UserId" value="">
                                        <input type="hidden" name="archiveUs" value="1">
                                        <input type="hidden" name="role" value="passager">
                                        <button class="mr-4" title="archive" name="archive" value="">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24"
                                                viewBox="0 -960 960 960" width="24">
                                                <path
                                                    d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q54 0 104-17.5t92-50.5L228-676q-33 42-50.5 92T160-480q0 134 93 227t227 93Zm252-124q33-42 50.5-92T800-480q0-134-93-227t-227-93q-54 0-104 17.5T284-732l448 448Z" />
                                            </svg>
                                        </button>


                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        <div class="mt-8 bg-white p-4 shadow rounded-lg mx-auto min-h-1/2">

            <h2 class="text-gray-500 text-lg font-semibold pb-4">Clients</h2>
            <div class="my-1"></div>
            <div class="bg-gradient-to-r from-sky-100 to-sky-900 h-px mb-6"></div>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white font-[sans-serif]">
                    <thead class="bg-gradient-to-r from-[#3554AD] to-[#F9B100] whitespace-nowrap">
                        <tr>

                            <th
                                class="px-6 py-3 text-left max-w-4  md:text-[15px] text-[12px] font-semibold text-white">
                                Profile
                            </th>
                            <th class="px-6 py-3 text-left md:text-[15px] text-[12px] font-semibold text-white">
                                FullName
                            </th>
                            <th class="px-6 py-3 text-left md:text-[15px] text-[12px] font-semibold text-white">
                                Phone
                            </th>
                            <th class="px-6 py-3 text-left md:text-[15px] text-[12px] font-semibold text-white">
                                E-mail
                            </th>
                            <th class="px-6 py-3 text-left md:text-[15px] text-[12px] font-semibold text-white">
                                Action
                            </th>
                            <th class="px-6 py-3 text-left md:text-[15px] text-[12px] font-semibold text-white">
                                ban
                            </th>
                        </tr>
                    </thead>
                    <tbody class="whitespace-nowrap">
                        @foreach ($clients as $client)
                            <tr class="even:bg-blue-50">
                                <td class="md:text-[15px] max-w-1  text-[12px]">
                                    <img class="w-full" src="{{ asset('storage/image/' . $client->user->Profil) }}"
                                        alt="">

                                </td>
                                <td class="pl-10 py-4 md:text-[15px] text-[12px]">
                                    {{ $client->user->lname }} {{ $client->user->fname }}
                                </td>
                                <td class="pl-4 py-4 md:text-[15px] text-[12px]">
                                    {{ $client->user->Phone }}
                                </td>


                                <td class="  md:text-[15px] text-left pl-8 text-[12px] ">
                                    {{ $client->user->email }}

                                </td>

                                <td class="pl-4 pt-8 flex">
                                    <form action="/archiveUser" method="post">
                                        @csrf
                                        <input type="hidden" name="UserId" value="">
                                        <input type="hidden" name="archiveUs" value="1">
                                        <input type="hidden" name="role" value="passager">
                                        <button class="mr-4" title="archive" name="archive" value="">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24" fill="red"
                                                viewBox="0 -960 960 960" width="24">
                                                <path
                                                    d="m480-240 160-160-56-56-64 64v-168h-80v168l-64-64-56 56 160 160ZM200-640v440h560v-440H200Zm0 520q-33 0-56.5-23.5T120-200v-499q0-14 4.5-27t13.5-24l50-61q11-14 27.5-21.5T250-840h460q18 0 34.5 7.5T772-811l50 61q9 11 13.5 24t4.5 27v499q0 33-23.5 56.5T760-120H200Zm16-600h528l-34-40H250l-34 40Zm264 300Z" />
                                            </svg>
                                        </button>


                                    </form>
                                    <form action="/archiveUser" method="post">
                                        @csrf
                                        <input type="hidden" name="UserId" value="">
                                        <input type="hidden" name="archiveUs" value="0">
                                        <input type="hidden" name="role" value="passager">

                                        <button class="mr-4" title="archive" name="unarchive" value="">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24" fill="green"
                                                viewBox="0 -960 960 960" width="24">
                                                <path
                                                    d="M480-560 320-400l56 56 64-64v168h80v-168l64 64 56-56-160-160Zm-280-80v440h560v-440H200Zm0 520q-33 0-56.5-23.5T120-200v-499q0-14 4.5-27t13.5-24l50-61q11-14 27.5-21.5T250-840h460q18 0 34.5 7.5T772-811l50 61q9 11 13.5 24t4.5 27v499q0 33-23.5 56.5T760-120H200Zm16-600h528l-34-40H250l-34 40Zm264 300Z" />
                                            </svg>

                                        </button>
                                    </form>
                                </td>
                                <td class="pl-8 pt-8 ">
                                    <form action="/archiveUser" method="post">
                                        @csrf
                                        <input type="hidden" name="UserId" value="">
                                        <input type="hidden" name="archiveUs" value="1">
                                        <input type="hidden" name="role" value="passager">
                                        <button class="mr-4" title="archive" name="archive" value="">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24"
                                                viewBox="0 -960 960 960" width="24">
                                                <path
                                                    d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q54 0 104-17.5t92-50.5L228-676q-33 42-50.5 92T160-480q0 134 93 227t227 93Zm252-124q33-42 50.5-92T800-480q0-134-93-227t-227-93q-54 0-104 17.5T284-732l448 448Z" />
                                            </svg>
                                        </button>


                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </section>
    <script>
        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
        }

        document.getElementById('addMedicamentButton').addEventListener('click', () => toggleModal('addCompetenceModal'));
        document.getElementById('closeJobModalButton').addEventListener('click', () => toggleModal(
            'addCompetenceModal'));
        document.getElementById('addJobButton').addEventListener('click', () => toggleModal('addJobModal'));
        document.getElementById('CloseJobButton').addEventListener('click', () => toggleModal('addJobModal'));
    </script>
</body>

</html>
