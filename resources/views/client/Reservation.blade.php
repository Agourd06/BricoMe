<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <title>Artisan Card</title>
</head>
<body class="bg-gray-100 p-8">
  <h1 class="text-4xl font-extrabold text-center mb-8 text-red-600">LIST OF RESERVATIONS</h1>
  <div class="bg-white max-w-md ml-4 mx-auto p-6 rounded-lg shadow-md w-5/12"> <!-- Adjusted padding -->
    <h2 class="text-center text-2xl font-extrabold mb-2 text-red-600">ARTISAN'S CARD</h2> <!-- Adjusted font size and margin -->

    <div class="flex flex-col mb-2">
      <label class="text-gray-700 font-bold text-sm">Artisan's Name:</label> <!-- Adjusted font size -->
      <p class="text-gray-800 font-normal">John Doe</p> <!-- Adjusted font size -->
    </div>

    <div class="flex flex-col mb-2">
      <label class="text-gray-700 font-bold text-sm">Address:</label> <!-- Adjusted font size -->
      <p class="text-gray-800 font-normal">123 Artisan Street, Cityville</p> <!-- Adjusted font size -->
    </div>

    <div class="flex flex-row mb-2">
      <div class="flex flex-col mr-2">
        <label class="text-gray-700 font-bold text-sm">Job:</label> <!-- Adjusted font size -->
        <p class="text-gray-800 font-normal">Artisan / Craftsperson</p> <!-- Adjusted font size -->
      </div>

      <div class="flex flex-col ml-4"> 
        <label class="text-gray-700 font-bold text-sm">Skills:</label> <!-- Adjusted font size -->
        <p class="text-gray-800 font-normal">#Skill1 #Skill2 #Skill3</p> <!-- Adjusted font size -->
      </div>
    </div>

    <div class="flex flex-col mb-2">
      <label class="text-gray-700 font-bold text-sm">Hourly Rate:</label> <!-- Adjusted font size -->
      <p class="text-gray-800 font-normal">$50/hour</p> <!-- Adjusted font size -->
    </div>

    <div class="flex flex-row mb-2">
      <div class="flex flex-col pr-2"> 
        <label class="text-gray-700 font-bold text-sm">Date of Creation:</label> <!-- Adjusted font size -->
        <p class="text-gray-800 font-normal">February 1, 2024</p> <!-- Adjusted font size -->
      </div>
      
      <div class="flex flex-col pr-2 ml-12">
        <label class="text-gray-700 font-bold text-sm">Date of Reservation:</label> <!-- Adjusted font size -->
        <p class="text-gray-800 font-normal">March 1, 2024</p> <!-- Adjusted font size -->
      </div>
    </div>

    <div class="flex justify-center">
      <button class="mt-4 bg-red-600 text-white px-3 py-1 rounded hover:bg-red-800 focus:outline-none focus:shadow-outline-red active:bg-red-800">
        Cancel Reservation
      </button>
    </div>
  </div>

</body>
</html>
