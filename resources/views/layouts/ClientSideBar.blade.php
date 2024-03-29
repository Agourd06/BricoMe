    <section>
        <div class="flex items-center fixed top-0  justify-between p-4 bg-white z-50 h-20 w-full shadow-md">
            <a href='/Client' class="max-md:mx-auto "><img
                src="{{ asset('storage/image/' . 'logo.png') }}" alt="logo"
                class='w-44 inline-block' /></a>            <i class='bx bx-menu-alt-right text-[40px] lg:hidden' onclick="toggleModal('sidebar')"></i>

        </div>
        <div class="w-full min-h-screen ">
            <div id="sidebar"
                class="hidden z-50  lg:flex h-full flex-col fixed  bottom-0 top-0 md:top-20 right-0 lg:left-0 lg:w-[20%] w-[350px] pt-8 bg-white shadow-2xl overflow-hidden">
                <div class="w-full pl-2 lg:hidden"  onclick="toggleModal('sidebar')"><i class='bx bx-x-circle text-[30px] text-[#858585]'></i></div>
                <ul class="flex flex-col py-4">

                    <li>
                        <a href="/Client"
                            class="flex flex-row mb-2  items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                            <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i
                                    class='bx bx-hard-hat'></i></span>
                            <span class="text-md  font-medium">Artisans</span>
                        </a>
                    </li>



                    <li>
                        <a href="/Reservation"
                            class="flex flex-row mb-2 items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                            <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i
                                    class='bx bxs-calendar-check'></i></span>
                            <span class="text-md font-medium">Reservations</span>
                            <span class="ml-auto mr-6 text-sm bg-red-100 rounded-full px-3 py-px text-red-500">{{$ReservTotal}}</span>
                        </a>
                    </li>
                
                    <li>
                        <a href="/reporting"
                            class="flex flex-row mb-2 items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                            <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i
                                    class='bx bx-error-alt'></i></span>
                            <span class="text-md font-medium">Repports</span>
                        </a>
                    </li>
                    <li>
                        <a href="/logout"
                            class="flex flex-row mb-2 items-center h-12 transform hover:translate-x-2 transition-transform ease-in duration-200 text-gray-500 hover:text-gray-800">
                            <span class="inline-flex items-center justify-center h-12 w-12 text-lg text-gray-400"><i
                                    class="bx bx-log-out"></i></span>
                            <span class="text-md font-medium">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="lg:w-[80%]  mt-20  lg:ml-auto">
                @yield('Reservation')

                @yield('artisans')
                @yield('Reserve')
                @yield('content')
                <footer
                    class="border border-white bg-gray-100 shadow-inner py-12 px-8   w-full font-[sans-serif] mt-10">
                    <div class="md:flex md:items-center ">
                        <div class="md:w-76 max-md:text-center">
                            <a href='/Client' class="max-md:mx-auto"><img
                                    src="{{ asset('storage/image/' . 'logo.png') }}" alt="logo"
                                    class='w-48 inline-block' /></a>
                        </div>
                        <div class="max-md:mt-8 w-full">
                            <div class="grid grid-cols-1 lg:grid-cols-3 items-center mb-8">
                                <ul
                                    class="col-span-2 md:flex max-lg:justify-center max-md:text-center md:space-x-4 max-md:space-y-4">
                                    <li>
                                        <a href='/Client'
                                            class='hover:text-[#3554AD] text-[#3524AD] text-[15px]'>Artisans</a>
                                    </li>
                                    <li>
                                        <a href='/Reservation'
                                            class='hover:text-[#3524AD] text-[#3524AD] text-[15px]'>Reservations</a>
                                    </li>
                                    <li>
                                        <a href='/reporting' class='hover:text-[#3554AD] text-[#3524AD] text-[15px]'>Repports</a>
                                    </li>
                                    <li>
                                        <a href='/logout' class='hover:text-[#3554AD] text-[#3524AD] text-[15px]'>log
                                            out</a>
                                    </li>

                                </ul>

                            </div>
                            <div class="border-t text-center border-[#6b5f5f] pt-8 mt-8">
                                <div class="text-center flex items-center justify-center mt-12 ">
                                    <p class='text-sm text-[#3554AD]  '>Copyright © 2024 BricoleMe All Rights Reserved.
                                    </p>

                                </div>
                            </div>
                        </div>
                </footer>
            </div>

        </div>
