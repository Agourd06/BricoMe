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
        <div class="w-[20%] h-screen bg-black"></div>

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
