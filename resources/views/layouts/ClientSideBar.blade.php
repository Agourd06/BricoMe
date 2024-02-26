    <div class="flex items-center fixed top-0  justify-between p-4 bg-white z-50 h-20 w-full shadow-md">
        <h1 class="text-3xl uppercase text-indigo-500">Logo</h1>
        <i class='bx bx-menu-alt-right text-[40px] lg:hidden' onclick="toggleModal('sidebar')"></i>
    </div>
    <div class="w-full min-h-screen ">
        <div id="sidebar"
            class="hidden z-50  lg:flex h-full flex-col fixed  bottom-0 top-0 md:top-20 right-0 lg:left-0 w-[340px] pt-8 bg-white shadow-2xl overflow-hidden">
            <div class="w-full pl-2 lg:hidden"><i class='bx bx-x-circle text-[30px] text-[#858585]'></i></div>
            <ul class="flex flex-col py-4">

                <li>
                    <a href="/Client"
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
                    <a href="/logout"
                        class="flex flex-row items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                        <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i
                                class="bx bx-log-out"></i></span>
                        <span class="text-sm font-medium">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="lg:w-[80%]  mt-20  lg:ml-auto">

            @yield('artisans')
            @yield('Reserve')
        </div>

    </div>
