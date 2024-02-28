@extends('layouts.master')
@section('welcome')
    <div class="font-[sans-serif] bg-gradient-to-r from-[#F0EEEE] via-[#E2DEDE] to-[#F0EEEE] text-[#333]">
        <div class="min-h-screen flex fle-col items-center justify-center lg:p-6 p-4">
            <div class="grid md:grid-cols-2 items-center gap-10 max-w-6xl w-full">
                <div class="rounded-md h-full shadow-2xl">
                    <img class="rounded-md shadow-2xl h-full" src="https://www.salon-maison-bois.com/wp-content/uploads/2021/11/homme-dans-son-atelier-de-bricolage-1165x675.jpg" alt="">
                </div>
                <form action="/login" method="POST" class="bg-white rounded-xl px-6 py-8 space-y-6 max-w-md md:ml-auto max-md:mx-auto w-full">
                  
                    <h3 class="text-3xl font-extrabold mb-12 max-md:text-center">
                        Sign in
                    </h3>
                    <div class="text-red-500 text-[20px] w-full text-center">
                        @if ($errors->any())
                            <div>{{ $errors->first() }}</div>
                        @endif
                    </div>
                    @csrf
                    <div>
                        <input name="email" type="email" autocomplete="email" 
                            class="bg-gray-100 w-full text-sm px-4 py-3.5 rounded-md outline-[#333]"
                            placeholder="Email address" />
                    </div>
                    <div>
                        <input name="password" type="password" autocomplete="current-password" 
                            class="bg-gray-100 w-full text-sm px-4 py-3.5 rounded-md outline-[#333]"
                            placeholder="Password" />
                    </div>
               
                    <div class="!mt-10">
                        <button type="submit"
                            class="w-full shadow-xl py-2.5 px-4 text-sm font-semibold rounded text-white bg-[#333] hover:bg-[#222] focus:outline-none">
                            Log in
                        </button>
                    </div>
                    <p class="my-10 text-sm text-gray-400 text-center">or continue with</p>
                    <div class="space-x-6 flex justify-center">
                        <a href="auth/google/callback" class="border-none outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30px" class="inline" viewBox="0 0 512 512">
                                <path fill="#fbbd00"
                                    d="M120 256c0-25.367 6.989-49.13 19.131-69.477v-86.308H52.823C18.568 144.703 0 198.922 0 256s18.568 111.297 52.823 155.785h86.308v-86.308C126.989 305.13 120 281.367 120 256z"
                                    data-original="#fbbd00" />
                                <path fill="#0f9d58"
                                    d="m256 392-60 60 60 60c57.079 0 111.297-18.568 155.785-52.823v-86.216h-86.216C305.044 385.147 281.181 392 256 392z"
                                    data-original="#0f9d58" />
                                <path fill="#31aa52"
                                    d="m139.131 325.477-86.308 86.308a260.085 260.085 0 0 0 22.158 25.235C123.333 485.371 187.62 512 256 512V392c-49.624 0-93.117-26.72-116.869-66.523z"
                                    data-original="#31aa52" />
                                <path fill="#3c79e6"
                                    d="M512 256a258.24 258.24 0 0 0-4.192-46.377l-2.251-12.299H256v120h121.452a135.385 135.385 0 0 1-51.884 55.638l86.216 86.216a260.085 260.085 0 0 0 25.235-22.158C485.371 388.667 512 324.38 512 256z"
                                    data-original="#3c79e6" />
                                <path fill="#cf2d48"
                                    d="m352.167 159.833 10.606 10.606 84.853-84.852-10.606-10.606C388.668 26.629 324.381 0 256 0l-60 60 60 60c36.326 0 70.479 14.146 96.167 39.833z"
                                    data-original="#cf2d48" />
                                <path fill="#eb4132"
                                    d="M256 120V0C187.62 0 123.333 26.629 74.98 74.98a259.849 259.849 0 0 0-22.158 25.235l86.308 86.308C162.883 146.72 206.376 120 256 120z"
                                    data-original="#eb4132" />
                            </svg>
                        </a>
                    
                  
                    </div>
                    <div class="w-full text-center">           <p class="text-sm mt-10 text-black">Don't have an account Register here As<a href="/ArtisanRegister"
                        class="text-blue-500 font-semibold underline ml-1">Artisan</a> Or As<a href="/RegisterClient"
                        class="text-blue-500 font-semibold underline ml-1">Client</a></p></div>
         
                        
                        
                </form>
            </div>
        </div>
    </div>
@endsection
