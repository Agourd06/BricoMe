<div class="flex items-center justify-between p-4 bg-white z-50 h-20 w-full shadow-md">
    <h1 class="text-3xl uppercase text-indigo-500">Logo</h1>
    <i class='bx bx-menu-alt-right text-[40px] ' onclick="toggleModal('sidebar')" ></i>
</div>
<div id="sidebar" class="hidden md:flex flex-col fixed left-0 w-[340px] pt-20 bg-white  shadow-2xl h-screen overflow-hidden">
    <ul class="flex flex-col py-4">
        <li>
            <a href="#"
                class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i
                        class="bx bx-home"></i></span>
                <span class="text-sm font-medium">Home</span>
            </a>
        </li>
        <li>
            <a href="#"
                class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i
                        class='bx bx-hard-hat'></i></span>
                <span class="text-sm  font-medium">Artisans</span>
            </a>
        </li>



        <li>
            <a href="#"
                class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i
                        class='bx bxs-calendar-check'></i></span>
                <span class="text-sm font-medium">Reservations</span>
                <span class="ml-auto mr-6 text-sm bg-red-100 rounded-full px-3 py-px text-red-500">5</span>
            </a>
        </li>
        <li>
            <a href="#"
                class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i
                        class='bx bx-history'></i></span>
                <span class="text-sm font-medium">History</span>
            </a>
        </li>
        <li>
            <a href="#"
                class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i
                        class='bx bx-error-alt'></i></span>
                <span class="text-sm font-medium">Repports</span>
            </a>
        </li>
        <li>
            <a href="#"
                class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i
                        class="bx bx-log-out"></i></span>
                <span class="text-sm font-medium">Logout</span>
            </a>
        </li>
    </ul>
</div>
