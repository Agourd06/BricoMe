<div class="py-4 px-6 bg-[#3554AD] flex items-center shadow-md shadow-black/5 sticky -top-0.5 left-0 z-30">
    <ul class="flex items-center text-sm ml-4">
        <li class="mr-2">
            <a href="" class="text-gray-200 text-lg hover:text-gray-400 font-bold">Administration</a>
        </li>
    </ul>
    <div class="md:absolute md:right-10 md:flex md:items-center max-md:ml-auto">

        <div class="mr-4 text-white font-semibold md:block hidden hover:text-[#F9B100]"><a href="/admin">Dashboard</a>
        </div>


        <div class=" inline-block w- border-gray-300 border-l-2 pl-6 cursor-pointer ">
            <button onclick="toggleModal('ProfilPop')"><svg xmlns="http://www.w3.org/2000/svg" height="24"
                    viewBox="0 -960 960 960" width="24">
                    <path class="outline-none"
                        d="M80-160v-160h160v160H80Zm240 0v-160h560v160H320ZM80-400v-160h160v160H80Zm240 0v-160h560v160H320ZM80-640v-160h160v160H80Zm240 0v-160h560v160H320Z" />
                </svg>
            </button>
            <div class="absolute z-50 w-[120px] hidden h-[85px] md:top-full rounded-md right-2 drop-shadow-2xl"
                id="ProfilPop">
                <a href='/adminUsers'
                    class='hover:bg-[#F9B100] rounded-t-md duration-300 hover:text-white w-full h-[50%] bg-white text-gray-600 font-bold text-[15px] flex items-center pl-4'>Users</a>
                <a href='/adminUsers'
                    class='md:hidden hover:bg-[#F9B100] rounded-t-md duration-300 hover:text-white w-full h-[50%] bg-white text-gray-600 font-bold text-[15px] flex items-center pl-4'>DashBoard</a>
                <div class="h-[50%]"> <a href=""> <span
                            class="absolute md:mt-2.5   rounded-[0.37rem] bg-red-800 px-[0.45em] py-[0.2em] text-[0.6rem] leading-none text-white">1</span>
                    </a>
                    <a href='/ReclamNotif'
                        class='hover:bg-[#F9B100] rounded-t-md duration-300 hover:text-white w-full h-full bg-white text-gray-600 font-bold text-[15px] flex items-center pl-4'>Réclamation</a>
                </div>
                <div class="h-[50%]"> <a href=""> <span
                            class="absolute md:mt-2.5   rounded-[0.37rem] bg-red-800 px-[0.45em] py-[0.2em] text-[0.6rem] leading-none text-white">1</span>
                    </a>
                    <a href='/reclamation'
                        class='hover:bg-[#F9B100] rounded-t-md duration-300 hover:text-white w-full h-full bg-white text-gray-600 font-bold text-[15px] flex items-center pl-4'>Add Job</a>
                </div>
                <a href='/logout'
                    class='hover:bg-[#F9B100] rounded-b-md duration-300 hover:text-white w-full h-[50%] bg-gray-300 text-gray-600 font-bold text-[15px] flex items-center pl-4'>log
                    out</a>
            </div>
        </div>
        <a href=""> <span
                class="absolute md:-mt-2.5   rounded-[0.37rem] bg-red-800 px-[0.45em] py-[0.2em] text-[0.6rem] leading-none text-white">1</span>
        </a>


    </div>
</div>
