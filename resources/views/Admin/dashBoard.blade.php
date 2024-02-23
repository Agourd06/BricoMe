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
        <div class="p-6">
            <div class="grid grid-cols-2 md:grid-cols-4  gap-6 my-6">
                <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                    <div class="flex justify-between ">
                        <div>
                            <div class="text-2xl font-semibold mb-1"></div>
                            <div class="text-sm font-medium text-gray-400">Clients</div>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                    <div class="flex justify-between mb-6">
                        <div>
                            <div class="text-2xl font-semibold mb-1"></div>
                            <div class="text-sm font-medium text-gray-400">Artisans</div>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                    <div class="flex justify-between ">
                        <div>
                            <div class="text-2xl font-semibold mb-1">
                                {{ $competenceCount }} </div>
                            <div class="text-sm font-medium text-gray-400">Competences</div>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
                    <div class="flex justify-between ">
                        <div>
                            <div class="text-2xl font-semibold mb-1">{{ $jobCount }}</div>
                            <div class="text-sm font-medium text-gray-400">Jobs</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
                    <div class="flex justify-between">
                        <div class="flex justify-between mb-4 items-start text-m font-semibold text-gray-700">
                            <h1> Manage Jobs</h1>
                        </div>
                        <button id="addJobButton"
                            class="flex justify-between mb-4 items-start text-m font-semibold text-[#F9B100] hover:bg-[#F9B100]/10 px-4 py-1 mt-10  rounded-[4px] border-[#F9B100] shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] border-solid border-[1px]">
                            Add
                        </button>
                    </div>

                    <div id="addJobModal" class="hidden fixed z-50 inset-0 overflow-y-auto">
                        <div
                            class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                            </div>
                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true"></span>
                            <div
                                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                @if ($editeJob !== null)
                                    <script>
                                        document.getElementById('addJobModal').classList.remove('hidden')
                                    </script>
                                    <form action="/updateJob" method="POST">
                                    @else
                                        <form action="/NewJob" method="POST">
                                @endif
                                @csrf
                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                    <div class="sm:flex sm:items-start">
                                        <div
                                            class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-gray-100 sm:mx-0 sm:h-10 sm:w-10">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24"
                                                viewBox="0 -960 960 960" width="24">
                                                <path
                                                    d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z" />
                                            </svg>
                                        </div>
                                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                            @if ($editeJob !== null)
                                                <h3 class="text-lg leading-6 font-medium text-gray-900"
                                                    id="modal-title">
                                                    Update Job
                                                </h3>
                                                <input type="hidden" name="job_id" value="{{ $editeJob->id }}">
                                            @else
                                                <h3 class="text-lg leading-6 font-medium text-gray-900"
                                                    id="modal-title">
                                                    Add New Job
                                                </h3>
                                            @endif

                                            <label for="name"
                                                class="block text-sm font-medium text-gray-700 mt-2">Job
                                                Name:</label>
                                            <input type="text" name="name" id="name"
                                                value="{{ $editeJob ? $editeJob->name : '' }}"
                                                class="mt-1 p-2 block w-full border-gray-300 rounded-md"
                                                placeholder="Enter Job name">
                                        </div>

                                    </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                    <button id="CloseJobButton" type="button"
                                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-gray-800 text-base font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:ml-3 sm:w-auto sm:text-sm">
                                        Close
                                    </button>
                                    @if ($editeJob !== null)
                                        <button id="" type="submit"
                                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-[#F9B100] text-base font-medium text-white hover:bg-[#F9B100]/80 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                                            Update Job
                                        </button>
                                    @else
                                        <button id="" type="submit"
                                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-[#F9B100] text-base font-medium text-white hover:bg-[#F9B100]/80 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                                            Add Job
                                        </button>
                                    @endif
                                </div>
                                </form>

                            </div>
                        </div>
                    </div>

                    <div id="addCompetenceModal" class="hidden fixed z-50 inset-0 overflow-y-auto">
                        <div
                            class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                            </div>
                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                aria-hidden="true"></span>
                            <div
                                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                    <div class="sm:flex sm:items-start">
                                        <div
                                            class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-gray-100 sm:mx-0 sm:h-10 sm:w-10">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24"
                                                viewBox="0 -960 960 960" width="24">
                                                <path
                                                    d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z" />
                                            </svg>
                                        </div>
                                        @if ($editeCompetence !== null)
                                            <script>
                                                document.getElementById('addCompetenceModal').classList.remove('hidden')
                                            </script>
                                        @endif
                                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">

                                            @if ($editeCompetence !== null)
                                                <h3 class="text-lg leading-6 font-medium text-gray-900"
                                                    id="modal-title">
                                                    Update New Competence
                                                </h3>
                                                <form action="/updateComeptences" method="POST" class="mt-8">
                                                @else
                                                    <h3 class="text-lg leading-6 font-medium text-gray-900"
                                                        id="modal-title">
                                                        Add New Competence
                                                    </h3>
                                                    <form action="/NewComeptences" method="POST" class="mt-8">
                                            @endif
                                            @csrf
                                            <label for="MedicamentName"
                                                class="block text-sm font-medium text-gray-700 mt-2">Competence
                                                Name:</label>
                                            @if ($editeCompetence !== null)
                                                <input type="hidden" name="IdCompetence"
                                                    value="{{ $editeCompetence->id }}">
                                            @endif
                                            <input type="text" name="name" id="CompetenceName"
                                                value="{{ $editeCompetence ? $editeCompetence->name : '' }}"
                                                class="mt-1 p-2 block w-full border-gray-300 rounded-md"
                                                placeholder="Enter Competence name">
                                            <div class="mb-4">
                                                <label for="id_job"
                                                    class="block text-sm font-medium text-gray-700">Jobs :</label>
                                                <select name="id_job" id="job"
                                                    class="mt-1 p-2 block w-full border-gray-300 rounded-md" required>
                                                    @foreach ($jobs as $job)
                                                        <option value="{{ $job->id }}">{{ $job->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                    <button id="closeJobModalButton" type="button"
                                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-gray-800 text-base font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:ml-3 sm:w-auto sm:text-sm">
                                        Close
                                    </button>
                                    @if ($editeCompetence !== null)
                                        <button id="" type="submit"
                                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-[#F9B100] text-base font-medium text-white hover:bg-[#F9B100]/80 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                                            Update Competence
                                        </button>
                                    @else
                                        <button id="" type="submit"
                                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-[#F9B100] text-base font-medium text-white hover:bg-[#F9B100]/80 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                                            Add Competence
                                        </button>
                                    @endif
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-x-auto py-8">
                        <table class="min-w-[50%] mx-auto bg-white font-[sans-serif]">
                            <thead class="whitespace-nowrap">
                                <tr>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-black">
                                        Jobs Name
                                    </th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-black">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="whitespace-nowrap">
                                @foreach ($jobs as $job)
                                    <tr class="odd:bg-blue-50">
                                        <td class="px-6 py-3 text-sm">{{ $job->name }}</td>
                                        <td class="px-6 py-3">
                                            <div class="flex">
                                                <form method="post" action="/editData">
                                                    @csrf
                                                    <input type="hidden" value="{{ $job->id }}" name=job_id>
                                                    <button class="mr-4" type="submit" name="edit"
                                                        value="">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="w-5 fill-black hover:fill-blue-700"
                                                            viewBox="0 0 348.882 348.882">
                                                            <path
                                                                d="m333.988 11.758-.42-.383A43.363 43.363 0 0 0 304.258 0a43.579 43.579 0 0 0-32.104 14.153L116.803 184.231a14.993 14.993 0 0 0-3.154 5.37l-18.267 54.762c-2.112 6.331-1.052 13.333 2.835 18.729 3.918 5.438 10.23 8.685 16.886 8.685h.001c2.879 0 5.693-.592 8.362-1.76l52.89-23.138a14.985 14.985 0 0 0 5.063-3.626L336.771 73.176c16.166-17.697 14.919-45.247-2.783-61.418zM130.381 234.247l10.719-32.134.904-.99 20.316 18.556-.904.99-31.035 13.578zm184.24-181.304L182.553 197.53l-20.316-18.556L294.305 34.386c2.583-2.828 6.118-4.386 9.954-4.386 3.365 0 6.588 1.252 9.082 3.53l.419.383c5.484 5.009 5.87 13.546.861 19.03z"
                                                                data-original="#000000" />
                                                            <path
                                                                d="M303.85 138.388c-8.284 0-15 6.716-15 15v127.347c0 21.034-17.113 38.147-38.147 38.147H68.904c-21.035 0-38.147-17.113-38.147-38.147V100.413c0-21.034 17.113-38.147 38.147-38.147h131.587c8.284 0 15-6.716 15-15s-6.716-15-15-15H68.904C31.327 32.266.757 62.837.757 100.413v180.321c0 37.576 30.571 68.147 68.147 68.147h181.798c37.576 0 68.147-30.571 68.147-68.147V153.388c.001-8.284-6.715-15-14.999-15z"
                                                                data-original="#000000" />
                                                        </svg>
                                                    </button>
                                                </form>



                                                @if ((int) $job->statut === 0)
                                                    <form action="/archive" method="post">
                                                        @csrf
                                                        <input type="hidden" name="job_id"
                                                            value="{{ $job->id }}">
                                                        <input type="hidden" name="archiveJob" value="1">
                                                        <button class="mr-4" title="archive" name="archive"
                                                            onclick="return confirm('Are you sure you want to Archive ?')"
                                                            value="">
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="24"
                                                                fill="red" viewBox="0 -960 960 960"
                                                                width="24">
                                                                <path
                                                                    d="m480-240 160-160-56-56-64 64v-168h-80v168l-64-64-56 56 160 160ZM200-640v440h560v-440H200Zm0 520q-33 0-56.5-23.5T120-200v-499q0-14 4.5-27t13.5-24l50-61q11-14 27.5-21.5T250-840h460q18 0 34.5 7.5T772-811l50 61q9 11 13.5 24t4.5 27v499q0 33-23.5 56.5T760-120H200Zm16-600h528l-34-40H250l-34 40Zm264 300Z" />
                                                            </svg>
                                                        </button>


                                                    </form>
                                                @else
                                                    <form action="/archive" method="post">
                                                        @csrf
                                                        <input type="hidden" name="job_id"
                                                            value="{{ $job->id }}">
                                                        <input type="hidden" name="archiveJob" value="0">

                                                        <button class="mr-4" title="archive" name="unarchive"
                                                            onclick="return confirm('Are you sure you want to Unarchive ?')"
                                                            value="">
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="24"
                                                                fill="green" viewBox="0 -960 960 960"
                                                                width="24">
                                                                <path
                                                                    d="M480-560 320-400l56 56 64-64v168h80v-168l64 64 56-56-160-160Zm-280-80v440h560v-440H200Zm0 520q-33 0-56.5-23.5T120-200v-499q0-14 4.5-27t13.5-24l50-61q11-14 27.5-21.5T250-840h460q18 0 34.5 7.5T772-811l50 61q9 11 13.5 24t4.5 27v499q0 33-23.5 56.5T760-120H200Zm16-600h528l-34-40H250l-34 40Zm264 300Z" />
                                                            </svg>

                                                        </button>
                                                    </form>
                                                @endif

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>





                <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
                    <div class="flex justify-between">
                        <div class="flex justify-between mb-4 items-start text-m font-semibold text-gray-700">
                            <u>Manage Competences</u>
                        </div>
                        <button id="addMedicamentButton"
                            class="flex justify-between mb-4 items-start text-m font-semibold text-[#F9B100] hover:bg-[#F9B100]/10 px-4 py-1 mt-10  rounded-[4px] border-[#F9B100] shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] border-solid border-[1px]">
                            Add
                        </button>
                    </div>

                    <div class="overflow-x-auto py-8">
                        <table class="min-w-[50%] mx-auto bg-white font-[sans-serif]">
                            <thead class="whitespace-nowrap">
                                <tr>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-black">
                                        Competence Name
                                    </th>
                                    <th class="px-6 py-4 text-center text-sm font-semibold text-black">
                                        Job
                                    </th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-black">
                                        Action
                                    </th>
                                </tr>
                            </thead>

                            <body>
                                @foreach ($competences as $competence)
                                    <tr class="odd:bg-blue-50">
                                        <td class="px-6 py-3 text-sm">
                                            <div class="flex items-center cursor-pointer">
                                                <div class="ml-4">
                                                    <p class="text-sm text-black">{{ $competence->name }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-3 text-sm">
                                            <div class="flex items-center cursor-pointer">
                                                <div class="">
                                                    <p class="text-sm mr-4 text-black">{{ $competence->job->name }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-3">
                                            <div class="flex">
                                                <form method="post" action="/editcom">
                                                    @csrf
                                                    <input type="hidden" name="competenceId"
                                                        value="{{ $competence->id }}">
                                                    <button class="mr-4" type="submit" name="edit"
                                                        value="">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="w-5 fill-black hover:fill-blue-700"
                                                            viewBox="0 0 348.882 348.882">
                                                            <path
                                                                d="m333.988 11.758-.42-.383A43.363 43.363 0 0 0 304.258 0a43.579 43.579 0 0 0-32.104 14.153L116.803 184.231a14.993 14.993 0 0 0-3.154 5.37l-18.267 54.762c-2.112 6.331-1.052 13.333 2.835 18.729 3.918 5.438 10.23 8.685 16.886 8.685h.001c2.879 0 5.693-.592 8.362-1.76l52.89-23.138a14.985 14.985 0 0 0 5.063-3.626L336.771 73.176c16.166-17.697 14.919-45.247-2.783-61.418zM130.381 234.247l10.719-32.134.904-.99 20.316 18.556-.904.99-31.035 13.578zm184.24-181.304L182.553 197.53l-20.316-18.556L294.305 34.386c2.583-2.828 6.118-4.386 9.954-4.386 3.365 0 6.588 1.252 9.082 3.53l.419.383c5.484 5.009 5.87 13.546.861 19.03z"
                                                                data-original="#000000" />
                                                            <path
                                                                d="M303.85 138.388c-8.284 0-15 6.716-15 15v127.347c0 21.034-17.113 38.147-38.147 38.147H68.904c-21.035 0-38.147-17.113-38.147-38.147V100.413c0-21.034 17.113-38.147 38.147-38.147h131.587c8.284 0 15-6.716 15-15s-6.716-15-15-15H68.904C31.327 32.266.757 62.837.757 100.413v180.321c0 37.576 30.571 68.147 68.147 68.147h181.798c37.576 0 68.147-30.571 68.147-68.147V153.388c.001-8.284-6.715-15-14.999-15z"
                                                                data-original="#000000" />
                                                        </svg>
                                                    </button>
                                                </form>


                                                @if ((int) $competence->statut === 0)
                                                    <form action="/archive" method="post">
                                                        @csrf
                                                        <input type="hidden" name="competence_id"
                                                            value="{{ $competence->id }}">
                                                        <input type="hidden" name="archiveCom" value="1">
                                                        <button class="mr-4" title="archive" name="archive"
                                                            onclick="return confirm('Are you sure you want to Archive ?')"
                                                            value="">
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="24"
                                                                fill="red" viewBox="0 -960 960 960"
                                                                width="24">
                                                                <path
                                                                    d="m480-240 160-160-56-56-64 64v-168h-80v168l-64-64-56 56 160 160ZM200-640v440h560v-440H200Zm0 520q-33 0-56.5-23.5T120-200v-499q0-14 4.5-27t13.5-24l50-61q11-14 27.5-21.5T250-840h460q18 0 34.5 7.5T772-811l50 61q9 11 13.5 24t4.5 27v499q0 33-23.5 56.5T760-120H200Zm16-600h528l-34-40H250l-34 40Zm264 300Z" />
                                                            </svg>
                                                        </button>


                                                    </form>
                                                @else
                                                    <form action="/archive" method="post">
                                                        @csrf
                                                        <input type="hidden" name="competence_id"
                                                            value="{{ $competence->id }}">
                                                        <input type="hidden" name="archiveCom" value="0">

                                                        <button class="mr-4" title="archive" name="unarchive"
                                                            onclick="return confirm('Are you sure you want to Unarchive ?')"
                                                            value="">
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="24"
                                                                fill="green" viewBox="0 -960 960 960"
                                                                width="24">
                                                                <path
                                                                    d="M480-560 320-400l56 56 64-64v168h80v-168l64 64 56-56-160-160Zm-280-80v440h560v-440H200Zm0 520q-33 0-56.5-23.5T120-200v-499q0-14 4.5-27t13.5-24l50-61q11-14 27.5-21.5T250-840h460q18 0 34.5 7.5T772-811l50 61q9 11 13.5 24t4.5 27v499q0 33-23.5 56.5T760-120H200Zm16-600h528l-34-40H250l-34 40Zm264 300Z" />
                                                            </svg>

                                                        </button>
                                                    </form>
                                                @endif

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
