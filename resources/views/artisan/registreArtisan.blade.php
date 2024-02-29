<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Include the Tailwind CSS stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>

<body>



    <div class="relative w-full  min-h-screen flex-col justify-center overflow-hidden bg-gray-50 py-6 sm:py-12">
        <div class="bg-white md:max-w-8xl md:mx-auto w-screen">
            <form action="/register" method="POST" enctype="multipart/form-data">

                <div class="grid grid-cols-6 h-full">
                    <div class="bg-blue-900 p-10 col-span-2 hidden md:block">
                        <h2
                            class="mb-10 font-bold text-2xl text-blue-100 before:block before:absolute before:bg-sky-300 before:content[''] relative before:w-20 before:h-1 before:-skew-y-3 before:-bottom-4 text-center">
                            ARTISAN PAGE</h2>
                        <p class="font-bold text-blue-100 py-8 border-b border-blue-700 text-center">
                            DESCRIPTION
                            <span class="font-normal text-normal text-blue-300 block">Immerse yourself in the world of
                                artisanal excellence, where passion meets precision</span>
                        </p>
                        <p class="font-bold text-blue-100 py-8 border-b border-blue-700 text-center">
                            OUR SLOGAN
                            <span class="font-normal text-normal text-blue-300 block text-center">Artisanal Mastery,
                                Every Piece a Symphony of Craftsmanship.</span>
                        </p>
                        <p class="font-bold text-blue-100 py-8 border-b border-blue-700 text-center">
                            PHONE MOBILE
                            <span class="font-normal text-xs text-blue-300 block text-center">+212600134052</span>
                        </p>
                        <p class="font-bold text-blue-100 py-8 border-b border-blue-700 text-center">
                            JOIN US
                            <span class="font-normal text-normal text-blue-300 block text-center p-b-4">"Join Our
                                Community, Where Passion Ignites Mastery. Unleash Your Creative Potential,
                                Connect with Fellow Craftsmen, and Elevate Your Art to New Heights."</span>
                        </p>

                    </div>
                    @csrf
                    <div class="bg-blue-100 p-8 w-screen  col-span-4">
                        <h2
                            class="mb-14 font-bold text-4xl text-blue-900 flex justify-center md:w-1/2 md:pl-9 text-center">
                            SIGN UP</h2>
                        <div class="text-red-500 text-[20px] w-full text-center">
                            @if ($errors->any())
                                <div>{{ $errors->first() }}</div>
                            @endif
                        </div>


                        <div class="md:flex gap-24">

                            <div>

                                <div class="grid gap-6 mt-3 mb-7 grid-cols-2">
                                    <div class="flex flex-col">
                                        <input type="text"
                                            class="py-4 bg-white rounded-full px-6 placeholder:text-xs"
                                            placeholder="Last Name" name="lname"></input>
                                    </div>
                                    <div class="flex flex-col">
                                        <input type="text"
                                            class="py-4 bg-white rounded-full px-6 placeholder:text-xs"
                                            placeholder="First Name" name="fname"></input>
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <input type="text"
                                        class="py-4 bg-white rounded-full px-6 placeholder:text-xs mb-4"
                                        placeholder="Your Email" name="email"></input>

                                </div>
                                <div class="grid gap-6 mb-6 grid-cols-2">
                                    <div class="flex flex-col">
                                        <input class="py-4 bg-white rounded-full px-6 placeholder:text-xs"
                                            type="password" placeholder="Password" name="password"></input>

                                    </div>
                                    <div class="flex flex-col">
                                        <input class="py-4 bg-white rounded-full px-6 placeholder:text-xs"
                                            type="password" placeholder="Confirmer Password" name="cpassword"></input>

                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <label for="phone"
                                        class="text-blue-900  font-bold mb-2 text-center">Phone</label>
                                    <input type="tel" class="py-4 bg-white rounded-full px-6 placeholder:text-xs"
                                        placeholder="phone" name="Phone">

                                </div>
                                <div class="flex flex-col">
                                    <label for="phone"
                                        class="text-blue-900 mt-2 font-bold mb-2 text-center">Birthday</label>
                                    <input type="date"
                                        class="py-4 mt-1 bg-white rounded-full px-6 placeholder:text-xs"
                                        placeholder="birthDay" name="birthDay"></input>
                                </div>
                                <div class="flex flex-col">
                                    <label for="city"
                                        class="text-blue-900 font-bold mb-2 text-center mt-2">City</label>
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

                            </div>
                            <div>


                                <div class="flex flex-col">
                                    <label for="profile-image"
                                        class="text-blue-900 -my-4 font-bold mb-2 text-center">Ajouter
                                        votre photo de profile</label>
                                    <input type="file" id="profile-image" name="Profil"
                                        class="py-4 mb-2 bg-white rounded-full px-6 placeholder:text-xs">

                                </div>
                                <!-- Job Input -->
                                <div class="flex flex-col">
                                    <label for="job"
                                        class="text-blue-900 font-bold mb-2 text-center">Métier</label>
                                    <select id="job" name="job_id" class="py-4 bg-white rounded-full px-6">
                                        <option value="" disabled selected>Select Your Job</option>
                                        @foreach ($jobs as $job)
                                            <option value="{{ $job->id }}">{{ $job->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="flex flex-col">
                                    <label class="text-blue-900 font-bold mb-2 text-center">Skills</label>
                                    <select id="skills" name="skills[]"
                                        class="py-2 px-4 bg-white rounded-md border border-gray-300 mb-2" multiple>
                                        <option value="" disabled selected>Select Your Skills</option>
                                        @foreach ($competences as $competence)
                                            <option value="{{ $competence->id }}"
                                                data-job="{{ $competence->job->id }}">{{ $competence->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="mt-4">

                                    <div id="multiplePhotosPanel" class=" mt-4 border border-gray-300 rounded-md p-4">
                                        <label class="text-blue-900 font-bold mb-2">Add one or multiple
                                            pictures</label>
                                        <input type="file" name="multiplePhotos[]" multiple
                                            class="py-2 px-4 bg-white rounded-md border border-gray-300">
                                      
                                    </div>
                                </div>
                                <div class="mb-6 mt-2 text-center">
                                    <label class="text-blue-900  font-bold mb-2">Description
                                        pictures</label>
                                    <textarea class="w-full rounded-2xl mt-3 placeholder:text-xs px-6 py-4 resize-none	m-t-2"
                                        placeholder="Votre description" name="description" id="" rows="3"></textarea>
                                </div>
                                <input type="hidden" name="role" value="artisan" />
                            </div>

                        </div>
                        <div class="flex justify-center">
                            <button
                                class="rounded-full bg-blue-900 text-white font-bold py-3 px-7 md:ml-40 min-w-40 hover:bg-blue-800 transition-all mt-4">SIGN
                                UP</button>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    </form>
    <script>
        $(document).ready(function() {
            var skillsDropdown = $('#skills');

            $('#job').change(function() {
                var selectedJobId = $(this).val();

                skillsDropdown.find('option').hide();
                
                skillsDropdown.find('option[data-job="' + selectedJobId + '"], option[value=""]').show();

                if (selectedJobId === '') {
                    skillsDropdown.val(null).trigger('change');
                }
            });
        });
    </script>


</body>

</html>