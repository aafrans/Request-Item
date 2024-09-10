<aside id="logo-sidebar" class=" fixed w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 "
    aria-label="Sidebar">
    <div class=" h-full px-3 pt-20 overflow-y-auto bg-gray-50 ">
        <ul class="space-y-2 font-medium mt-3 ">
            <li>
                @if (Auth::user()->role === 'admin')
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true"
                        fill="currentColor" viewBox="0 0 22 21">
                        <path
                            d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path
                            d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('items.index') }}"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4m16 0v8a2 2 0 01-2 2H6a2 2 0 01-2-2v-8m16 0l-2-5a2 2 0 00-2-1H8a2 2 0 00-2 1l-2 5m16 0v-4a2 2 0 00-2-2h-2a2 2 0 00-2 2v4" />
                    </svg>
                    <span class="ml-3">Item</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.ManagementUser.index') }}"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9A3.75 3.75 0 1112 5.25 3.75 3.75 0 0115.75 9zM12 14.25c-2.917 0-5.25 1.933-5.25 4.312v.938a.75.75 0 00.75.75h9a.75.75 0 00.75-.75v-.938c0-2.379-2.333-4.312-5.25-4.312z" />
                      </svg>
                    <span class="ml-3">Management User</span>
                </a>
            </li>
            @endif
            <li>
                <a href="{{ route('user.dashboard') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true"
                        fill="currentColor" viewBox="0 0 22 21">
                        <path
                            d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path
                            d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>

        </ul>
        <!-- Footer di bagian bawah sidebar -->
        <div class="bg-gray-50 absolute bottom-5 left-3">
            <img class="h-12 mx-2 " src="{{ asset('img/Yakes & Loving (Black).png') }}" alt="footer" />
        </div>
    </div>
</aside>
