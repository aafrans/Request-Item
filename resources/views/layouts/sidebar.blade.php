<aside id="logo-sidebar" class=" fixed w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class=" h-full px-3 py-20 overflow-y-auto bg-gray-50 ">
        <ul class="space-y-2 font-medium mt-3 ">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" fill="currentColor" viewBox="0 0 22 21">
                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('items.index') }}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6M9 16.5h3m-4.5-9h9M6.75 3.75A.75.75 0 007.5 3h9a.75.75 0 01.75.75v.75h2.25a.75.75 0 01.75.75v15.75a.75.75 0 01-.75.75H4.5a.75.75 0 01-.75-.75V5.25a.75.75 0 01.75-.75h2.25V3.75z" />
                    </svg>
                    <span class="ml-3">Item List</span>
                </a>
            </li>
            <li>
                <a href="{{ route('kategori.index') }}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6M9 16.5h3m-4.5-9h9M6.75 3.75A.75.75 0 007.5 3h9a.75.75 0 01.75.75v.75h2.25a.75.75 0 01.75.75v15.75a.75.75 0 01-.75.75H4.5a.75.75 0 01-.75-.75V5.25a.75.75 0 01.75-.75h2.25V3.75z" />
                    </svg>
                    <span class="ml-3">Kategori List</span>
                </a>
            </li>
        </ul>
         <!-- Footer di bagian bawah sidebar -->
     <div class="bg-gray-50" style="margin-top: 510px">
        <img class="h-12 mx-2 mb-2" src="{{ asset('img/Yakes & Loving (Black).png') }}" alt="footer" />
    </div>
    </div>
</aside>
  {{-- <li>
                    <a href="{{ route('requests.index') }}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6M9 16.5h3m-4.5-9h9M6.75 3.75A.75.75 0 007.5 3h9a.75.75 0 01.75.75v.75h2.25a.75.75 0 01.75.75v15.75a.75.75 0 01-.75.75H4.5a.75.75 0 01-.75-.75V5.25a.75.75 0 01.75-.75h2.25V3.75z" />
                        </svg>
                        <i class="fas fa-list text-lg text-gray-600"></i>
                        <span class="ml-3">Request</span>
                    </a>
                </li> --}}
         {{-- <li>
                <a href="{{ route('requests.show', ['id' => 1]) }}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-200">
                    <i class="fas fa-info-circle text-lg text-gray-600"></i>
                    <span class="ml-3">Detail</span>
                </a>
            </li> --}}
            {{-- <li>
                <a href="{{ route('stock.check') }}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-200">
                    <i class="fas fa-boxes text-lg text-gray-600"></i>
                    <span class="ml-3">Stok</span>
                </a>
            </li> -->
            <li>
                <a href="{{ route('user_memos.index') }}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-200">
                    <i class="fas fa-sticky-note text-lg text-gray-600"></i>
                    <span class="ml-3">Memo</span>
                </a>
            </li> --}}
