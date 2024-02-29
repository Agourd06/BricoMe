<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>BricoleMe</title>

</head>




<body class="text-gray-800 font-inter">
    <section class="w-full   bg-gray-50 min-h-screen transition-all main">
        @include('layouts/admineNav')
        <div class="flex">
            <div class="w-[20%] h-screen bg-[#3554AD] text-white flex flex-col justify-center pb-10 px-4">
                <h1 class="text-center text-3xl font-bold mb-10">Dear Administrator :</h1>

                <p class="text-center text-lg font-semibold mb-10">Your attention is required! We value a fair and safe
                    environment for all users. Please take a moment to visit the Report Review Center to assess and
                    address
                    user reports.</p>
                <h3 class="text-center text-xl font-bold">Your Decision Matters</h3>
            </div>
            @if ($reclamations->count() > 0)
                <div class=" w-[80%] text-center py-4 px-8 grid grid-cols-1 h-full">
                    @if (session('success'))
                        <div id="success-message"
                            class="bg-green-600 rounded-md  fixed right-20  top-50 z-50 text-white p-4 text-center animate-bounce mb-4">
                            {{ session('success') }}
                        </div>

                        <script>
                            setTimeout(function() {
                                document.getElementById('success-message').style.display = 'none';
                            }, 5000);
                        </script>
                    @endif
                    @foreach ($reclamations as $reclamation)
                        <div class="mb-8 border border-gray-100 border-solid ">
                            <div class="px-8 w-full py-4  rounded-md shadow-lg">
                                <div class=" ">
                                    <div class="text-left font-semibold">
                                        <h1>Dear Administrator,</h1>
                                    </div>
                                    <i class='bx bxs-bell-ring text-right text-2xl' style='color:#bf0000'></i>

                                </div>

                                <p>{{ $reclamation->message }}
                                </p>
                                <div class="flex justify-between">
                                    <p class="font-semibold">{{ $reclamation->email }} </p>
                                    <p class="font-semibold">Client : {{ $reclamation->fname }}
                                        {{ $reclamation->lname }}
                                    </p>
                                </div>
                                <p class="font-semibold text-center">Repported Artisan : {{ $reclamation->artisanName }}
                                </p>
                            </div>
                            <form action="/deletRepport" method="post">
                                @csrf
                                <input type="hidden" name="repport_id" value="{{ $reclamation->id }}">
                                <button type="submit"
                                    class=" w-full  px-8 bg-red-700 hover:bg-red-400 text-white shadow-xl">delete</button>
                            </form>

                        </div>
                    @endforeach

                </div>
            @else
                <div class="w-full text-xl font-semibold text-center mt-10">
                    <p>No Reclamation Found</p>
                </div>
            @endif
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
