@extends('layouts.master')
@section('client')



<div class="relative flex min-h-screen flex-col justify-center overflow-hidden bg-gray-50 py-6 sm:py-12">
  <div class="bg-[#3554AD] max-w-4xl mx-auto w-full">
    <div class="grid grid-cols-6 h-full">
      <div class="bg-primary p-10 col-span-2">
        <h2 class="mb-10 font-bold text-2xl text-[#F9B100] before:block before:absolute before:bg-sky-300 before:content[''] relative before:w-20 before:h-1 before:-skew-y-3 before:-bottom-4 text-center">CLIENT PAGE</h2>
        <p class="font-bold text-[#F9B100] py-8 border-b border-blue-700 text-center">
          DESCRIPTION
          <span class="font-normal text-normal text-blue-300 block">Dive into a realm of unparalleled possibilities on our platform, where your aspirations converge with cutting-edge solutions</span>
        </p>
        <p class="font-bold text-[#F9B100] py-8 border-b border-blue-700 text-center">
          OUR SLOGAN
          <span class="font-normal text-normal text-blue-300 block text-center">Artisanal Mastery, Every Piece a Symphony of Craftsmanship.</span>
        </p>
        <p class="font-bold text-[#F9B100] py-8 border-b border-blue-700 text-center">
          PHONE MOBILE
          <span class="font-normal text-xs text-blue-300 block text-center">+212600134052</span>
        </p>
        <p class="font-bold text-[#F9B100] py-8 border-b border-blue-700 text-center">
          JOIN US
          <span class="font-normal text-normal text-blue-300 block text-center p-b-4">"Join Our Community, Where Passion Ignites Mastery. Unleash Your Creative Potential, 
            Connect with Fellow Craftsmen, and Elevate Your Art to New Heights."</span>
        </p>

      </div>
      <div class="bg-slate-100 p-14 col-span-4">
        <h2 class="mb-14 font-bold text-4xl text-[#F9B100] before:block before:absolute before:bg-sky-300 before:content[''] relative before:w-20 before:h-1 before:-skew-y-3 before:-bottom-4 text-center">SIGN UP</h2>
        <form action="" method="post">       
        <div class="grid gap-6 mb-6 grid-cols-2">
          <div class="flex flex-col">
            <input type="text" class="py-4 bg-white rounded-full px-6 placeholder:text-xs" placeholder="Votre nom" name="nom"></input>
          </div>
          <div class="flex flex-col">
            <input type="text" class="py-4 bg-white rounded-full px-6 placeholder:text-xs"  placeholder="Votre prénom" name="prénom"></input>
          </div>
        </div>
        <div class="flex flex-col my-4">
        <label for="birth_date" class="text-[#F9B100] -my-4 font-bold mb-2 text-center">Ajouter votre date de naissance</label>
            <input id="birth_date" type="date" class="py-4 bg-white rounded-full px-6 placeholder:text-xs"  placeholder="Votre date de naissance" name="birthdate"></input>
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
        <label for="city" class="text-[#F9B100] font-bold mb-2 text-center mt-2">City</label>
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
            <label for="profile-image" class="text-[#F9B100] -my-4 font-bold mb-2 text-center">Ajouter votre photo de profile</label>
            <input type="file" id="profile-image" name="profile-image" accept="image/*" class="py-4 mb-2 bg-white rounded-full px-6 placeholder:text-xs">
        </div>
        <div class="flex justify-center">
          <button class="rounded-full bg-[#F9B100] text-white font-bold py-4 px-6 min-w-40 hover:bg-blue-800 transition-all mt-4">SIGN UP</button>
        </div>
        </form>
    </div>
    </div>
      </div>
    </div>
  </div>
</div>

