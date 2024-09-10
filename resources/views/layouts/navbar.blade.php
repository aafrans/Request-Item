<nav class="bg-gray-50 fixed w-full z-50 top-0 left-0 border-b border-gray-200">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <!-- Sidebar Toggle Button -->
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden focus:outline-none focus:ring-2 focus:ring-gray-200">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                    </svg>
                </button>

                <!-- Logo -->
                <a href="#" class="flex items-center ml-2 ml-20">
                    <img class="h-10 sm:h-12 mr-3" src="\img\Yakes Pertamina Logo.png" alt="Logo" />
                </a>

                <!-- Title -->
                <h1 class="text-lg sm:text-2xl md:text-3xl font-semibold text-gray-900 ml-4 sm:ml-6 md:ml-8" style="margin-left: 100px;">Goods Request System</h1>
            </div>

            <div class="flex items-center">
                <!-- User Dropdown -->
                <div class="relative">
                    <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" type="button">
                        <span class="sr-only">User Menu</span>
                        <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="User avatar">
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="dropdownAvatar" class="hidden z-50 my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-lg w-44">
                        <div class="px-4 py-3">
                            @if(auth()->check())
                                <span class="block text-sm text-gray-900">{{ auth()->user()->name }}</span>
                                <span class="block text-sm font-medium text-gray-500 truncate">{{ auth()->user()->email }}</span>
                            @else
                                <span class="block text-sm text-gray-900">Guest</span>
                            @endif
                        </div>
                        <ul class="py-2" aria-labelledby="dropdownUserAvatarButton">
                            @if(auth()->check())
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign out</button>
                                    </form>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('login') }}" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign in</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
