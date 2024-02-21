<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Include the Tailwind CSS stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>

<div class="relative flex min-h-screen flex-col justify-center overflow-hidden bg-gray-50 py-6 sm:py-12">
  <div class="bg-white max-w-4xl mx-auto w-full">
    <div class="grid grid-cols-6 h-full">
      <div class="bg-blue-900 p-10 col-span-2">
        <h2 class="mb-10 font-bold text-2xl text-blue-100 before:block before:absolute before:bg-sky-300 before:content[''] relative before:w-20 before:h-1 before:-skew-y-3 before:-bottom-4 text-center">ARTISAN PAGE</h2>
        <p class="font-bold text-blue-100 py-8 border-b border-blue-700 text-center">
          DESCRIPTION
          <span class="font-normal text-normal text-blue-300 block">Immerse yourself in the world of artisanal excellence, where passion meets precision</span>
        </p>
        <p class="font-bold text-blue-100 py-8 border-b border-blue-700 text-center">
          OUR SLOGAN
          <span class="font-normal text-normal text-blue-300 block text-center">Artisanal Mastery, Every Piece a Symphony of Craftsmanship.</span>
        </p>
        <p class="font-bold text-blue-100 py-8 border-b border-blue-700 text-center">
          PHONE MOBILE
          <span class="font-normal text-xs text-blue-300 block text-center">+212600134052</span>
        </p>
        <p class="font-bold text-blue-100 py-8 border-b border-blue-700 text-center">
          JOIN US
          <span class="font-normal text-normal text-blue-300 block text-center p-b-4">"Join Our Community, Where Passion Ignites Mastery. Unleash Your Creative Potential, 
            Connect with Fellow Craftsmen, and Elevate Your Art to New Heights."</span>
        </p>

      </div>
      <div class="bg-blue-50 p-14 col-span-4">
        <h2 class="mb-14 font-bold text-4xl text-blue-900 before:block before:absolute before:bg-sky-300 before:content[''] relative before:w-20 before:h-1 before:-skew-y-3 before:-bottom-4 text-center">SIGN UP</h2>
        <div class="grid gap-6 mb-6 grid-cols-2">
          <div class="flex flex-col">
            <input type="text" class="py-4 bg-white rounded-full px-6 placeholder:text-xs" placeholder="Votre nom" name="nom"></input>
          </div>
          <div class="flex flex-col">
            <input type="text" class="py-4 bg-white rounded-full px-6 placeholder:text-xs"  placeholder="Votre prénom" name="prénom"></input>
          </div>
        </div>
        <div class="flex flex-col">
            <input type="text" class="py-4 bg-white rounded-full px-6 placeholder:text-xs mb-4"  placeholder="Votre email" name="email"></input>
          </div>
        <div class="grid gap-6 mb-6 grid-cols-2">
          <div class="flex flex-col">
            <input class="py-4 bg-white rounded-full px-6 placeholder:text-xs"  placeholder="Mot de passe" name="password"></input>
          </div>
          <div class="flex flex-col">
            <input class="py-4 bg-white rounded-full px-6 placeholder:text-xs"  placeholder="Confirmer mot de passe" name="cpassword"></inpu>
          </div>
        </div>
        <div class="flex flex-col">
            <input type="text" class="py-4 bg-white rounded-full px-6 placeholder:text-xs" placeholder="Votre Télephone" name="telephone"></input>
          </div>
          <div class="flex flex-col">
        <label for="city" class="text-blue-900 font-bold mb-2 text-center mt-2">City</label>
        <select id="city" name="city" class="py-4 bg-white rounded-full px-6 mb-4">
            <option value="" disabled selected>Sélectionnez votre ville</option>
            <option value="safi">Safi</option>
            <option value="casablanca">Casablanca</option>
            <option value="chefchaouen">chefchaouen</option>
            <option value="eljedida">Eljadida</option>
            <option value="marrakech">Marrakech</option>
            <option value="tetouan">Tetouan</option>
            <option value="tanger">Tanger</option>
            <option value="assila">Assila</option>
            <option value="essaouira">Essaouira</option>
        </select>
    </div>
        <div class="mb-6">
          <textarea class="w-full rounded-2xl placeholder:text-xs px-6 py-4 resize-none	m-t-2" placeholder="Votre description" name="description" id="" rows="3"></textarea>
        </div>
        <div class="flex flex-col">
            <label for="profile-image" class="text-blue-900 -my-4 font-bold mb-2 text-center">Ajouter votre photo de profile</label>
            <input type="file" id="profile-image" name="profile-image" accept="image/*" class="py-4 mb-2 bg-white rounded-full px-6 placeholder:text-xs">
        </div>
         <!-- Job Input -->
    <div class="flex flex-col">
        <label for="job" class="text-blue-900 font-bold mb-2 text-center">Métier</label>
        <select id="job" name="job" class="py-4 bg-white rounded-full px-6">
            <option value="" disabled selected>Sélectionnez votre métier</option>
            <option value="artisan">Artisan</option>
            <option value="craftsman">Craftsman</option>
            <option value="blacksmith">Blacksmith</option>
            <option value="woodworker">Woodworker</option>
            <option value="potter">Potter</option>
            <option value="jeweler">Jeweler</option>
            <option value="leatherworker">Leatherworker</option>
            <option value="weaver">Weaver</option>
            <option value="glassblower">Glassblower</option>
        </select>
    </div>
<div class="flex flex-col">
    <label class="text-blue-900 font-bold mb-2 text-center">Compétences</label>
    <select id="skills" name="skills[]" multiple class="py-2 px-4 bg-white rounded-md border border-gray-300 mb-2">
        <option value="skill1">Compétence 1</option>
        <option value="skill2">Compétence 2</option>
        <option value="skill3">Compétence 3</option>
        <option value="skill3">Compétence 4</option>
        <option value="skill3">Compétence 5</option>
        <option value="skill3">Compétence 6</option>
        <option value="skill3">Compétence 7</option>
    </select>
</div>
<label class="text-blue-900 font-bold mb-2">Voulez-vous ajouter une seule photo ou plusieurs ?</label>

    <input type="radio" id="singlePhotoTab" name="photoTabs" class="hidden" checked>
    <input type="radio" id="multiplePhotosTab" name="photoTabs" class="hidden">

    <div class="flex items-center">
        <label for="singlePhotoTab" class="cursor-pointer mt-2  py-2 px-4 bg-white rounded-l-md border border-gray-300 hover:bg-gray-100">Une seule photo</label>
        <label for="multiplePhotosTab" class="cursor-pointer mt-2 py-2 px-4 bg-white rounded-r-md border border-gray-300 hover:bg-gray-100">Plusieurs photos</label>
    </div>

    <div class="mt-4">
        <div id="singlePhotoPanel" class="border border-gray-300 rounded-md p-4">
            <label class="text-blue-900 font-bold mb-2">Ajouter une seule photo :</label>
            <!-- Champs pour une seule photo -->
            <input type="file" name="singlePhoto" class="py-2 px-4 bg-white rounded-md border border-gray-300">
        </div>

        <div id="multiplePhotosPanel" class="hidden mt-4 border border-gray-300 rounded-md p-4">
            <label class="text-blue-900 font-bold mb-2">Ajouter plusieurs photos :</label>
            <!-- Champs pour plusieurs photos -->
            <input type="file" name="multiplePhotos[]" multiple class="py-2 px-4 bg-white rounded-md border border-gray-300">
        </div>
    </div>

    <script>
        document.getElementById('singlePhotoTab').addEventListener('click', function () {
            document.getElementById('singlePhotoPanel').classList.remove('hidden');
            document.getElementById('multiplePhotosPanel').classList.add('hidden');
        });

        document.getElementById('multiplePhotosTab').addEventListener('click', function () {
            document.getElementById('singlePhotoPanel').classList.add('hidden');
            document.getElementById('multiplePhotosPanel').classList.remove('hidden');
        });
    </script>
    <div class="mt-4" id="servicesPanel">
    <label class="text-blue-900 font-bold mb-2 text-center">Services et Tarifs :</label>

    <div class="grid grid-cols-2 gap-4">
        <div class="flex flex-col">
            <label for="service1">Service 1 :</label>
            <input type="text" id="service1" name="service1" class="py-2 px-4 bg-white rounded-md border border-gray-300 mb-2">
            <label for="tarif1">Tarif pour le Service 1 :</label>
            <input type="number" id="tarif1" name="tarif1" class="py-2 px-4 bg-white rounded-md border border-gray-300">
        </div>

        <div class="flex flex-col">
            <label for="service2">Service 2 :</label>
            <input type="text" id="service2" name="service2" class="py-2 px-4 bg-white rounded-md border border-gray-300 mb-2">
            <label for="tarif2">Tarif pour le Service 2 :</label>
            <input type="number" id="tarif2" name="tarif2" class="py-2 px-4 bg-white rounded-md border border-gray-300">
        </div>
    </div>
</div>
        <div class="flex justify-center">
          <button class="rounded-full bg-blue-900 text-white font-bold py-4 px-6 min-w-40 hover:bg-blue-800 transition-all mt-4">SIGN UP</button>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
