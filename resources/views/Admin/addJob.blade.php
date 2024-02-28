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
    <section class="w-full bg-gray-50 min-h-screen transition-all main">
        @include('layouts/admineNav')

        <div
        class="bg-white max-w-md ml-4 p-1 rounded-lg shadow-2xl w-full max-w-md rounded-lg font-[sans-serif]  mx-auto mt-9">
        <div class="px-8 my-9">
          <h3 class="text-xl font-semibold">Heading</h3>
          <p class="mt-2 text-md text-gray-400">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor auctor
            arcu,
            at fermentum dui. Maecenas</p>
            <div class="flex mt-4 justify-end gap-2">
                <button type="button"
                class="px-4 py-2 mt-4 rounded text-white text-sm tracking-wider  font-semibold border-none outline-none bg-emerald-800	 hover:bg-emerald-900 active:bg-emerald-800">Accepte </button>
                <button type="button"
            class="px-4 py-2 mt-4 rounded text-white text-sm tracking-wider  font-semibold border-none outline-none bg-red-700	 hover:bg-red-900 active:bg-red-700	">Decline </button>
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
