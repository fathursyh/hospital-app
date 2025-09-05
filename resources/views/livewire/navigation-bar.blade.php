<nav class="border-gray-200 bg-white px-4 py-2.5 shadow-sm lg:px-6">
    <div class="mx-auto flex max-w-screen-xl flex-wrap items-center justify-between">
        <a href="/" class="flex items-center py-2">
            <i class="fas fa-hospital mr-3 text-2xl text-blue-600"></i>
            <span class="self-center whitespace-nowrap text-xl font-semibold text-gray-900">F-Hospital</span>
        </a>
        @auth
            <button type="button" class="flex order-2 font-semibold" id="user-menu-button" aria-expanded="false"
                data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                {{ auth()->user()->name }}
                <svg class="w-6 h-6 pt-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m8 10 4 4 4-4" />
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-300 rounded-lg shadow-sm border"
                id="user-dropdown">
                <div class="px-4 py-3">
                    <span
                        class="block text-sm text-gray-500 truncate">{{ auth()->user()->email }}</span>
                </div>
                <ul class="py-2" aria-labelledby="user-menu-button">
                    <li>
                        <a href="{{ route('dashboard') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 font-medium">Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                            class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Sign
                            out</a>
                    </li>
                </ul>
            </div>
        @endauth
        @guest
            <div class="flex items-center gap-2 lg:order-2">
                <a href="/sign-in">
                    <x-ui.button>Sign In</x-ui.button>
                </a>
                <a href="/sign-up">
                    <x-ui.button buttonType="outline">Get Started</x-ui.button>
                </a>
            </div>
        @endguest
        <div class="hidden w-full items-center justify-between lg:order-1 lg:flex lg:w-auto" id="mobile-menu-2">
            @if (request()->is('/'))
                <ul class="mt-4 flex flex-col font-medium lg:mt-0 lg:flex-row lg:space-x-8">
                    <li>
                        <a href="#features" class="block py-2 pl-3 pr-4 text-gray-700 hover:text-blue-700">Features</a>
                    </li>
                    <li>
                        <a href="#about" class="block py-2 pl-3 pr-4 text-gray-700 hover:text-blue-700">About</a>
                    </li>
                    <li>
                        <a href="#pricing" class="block py-2 pl-3 pr-4 text-gray-700 hover:text-blue-700">Pricing</a>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</nav>
