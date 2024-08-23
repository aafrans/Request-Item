<nav class="bg-gray-50 fixed w-full z-50 top-0 left-0 border-b border-gray-200">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                    </svg>
                </button>
                <a href="#" class="flex items-center ml-2">
                    <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="Flowbite Logo">
                    <span class="self-center text-xl font-semibold whitespace-nowrap">Flowbite</span>
                </a>
            </div>
            <div class="flex items-center">
                <button type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                    <span class="sr-only">Search</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.9 11.1h-.79l-.28-.27a6.473 6.473 0 001.48-4.38C13.3 3.26 10.04 0 6.25 0S-.8 3.26-.8 6.25 3.26 12.5 6.25 12.5c1.65 0 3.16-.61 4.33-1.62l.27.28v.79l5.4 5.35 1.6-1.6-5.35-5.4zm-6.65 1.4a4.57 4.57 0 110-9.14 4.57 4.57 0 010 9.14z"></path>
                    </svg>
                </button>
                <div class="relative">
                    <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" type="button">
                        <span class="sr-only">User Menu</span>
                        <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="User Photo">
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownAvatar" class="hidden z-50 my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-lg w-44">
                        <div class="px-4 py-3">
                            <span class="block text-sm text-gray-900">{{ Auth::user()->name }}</span>
                            <span class="block text-sm font-medium text-gray-500 truncate">{{ Auth::user()->email }}</span>
                        </div>
                        <ul class="py-2" aria-labelledby="dropdownUserAvatarButton">
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign out</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Tambahkan script ini untuk mengaktifkan dropdown -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropdownButton = document.getElementById('dropdownUserAvatarButton');
        const dropdownMenu = document.getElementById('dropdownAvatar');

        dropdownButton.addEventListener('click', function() {
            dropdownMenu.classList.toggle('hidden');
        });
    });
</script>
