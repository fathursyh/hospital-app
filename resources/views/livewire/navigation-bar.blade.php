<nav class="border-gray-200 bg-white px-4 py-2.5 shadow-sm lg:px-6">
    <div class="mx-auto flex max-w-screen-xl flex-wrap items-center justify-between">
        <a href="/" class="flex items-center">
            <i class="fas fa-hospital mr-3 text-2xl text-blue-600"></i>
            <span class="self-center whitespace-nowrap text-xl font-semibold text-gray-900">F-Hospital</span>
        </a>
        @auth
            <a href="/dashboard" class="order-2">
                <x-ui.button>Dashboard</x-ui.button>
            </a>
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
