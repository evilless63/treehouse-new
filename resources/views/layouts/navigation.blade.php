<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 fixed w-full z-10 pin-t">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                    </a>
                </div>
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>Главная</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('articles.index')" :active="request()->routeIs('articles.index')">
                                Статьи
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('articles.special.edit', [
                                'slug' => 'privacy-policy',
                              ])">
                                Политика конфидециальности
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('articles.special.edit', [
                                'slug' => 'public-offer',
                              ])">
                                Публичная оферта
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('sliders.index')" :active="request()->routeIs('sliders.index')">
                                Слайдеры
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('banners.index')" :active="request()->routeIs('banners.index')">
                                Баннеры
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('lookbooks.index')" :active="request()->routeIs('lookbooks.index')">
                                Лукбуки
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                </div>
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>Магазин</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('categories.index')" :active="request()->routeIs('categories.index')">
                                Категории
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('products.index')" :active="request()->routeIs('products.index')">
                                Товары
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('colors.index')" :active="request()->routeIs('colors.index')">
                                Цвета
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('sizes.index')" :active="request()->routeIs('sizes.index')">
                                Размеры
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('promocodes.index')" :active="request()->routeIs('promocodes.index')">
                                Промокоды
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">

                    <x-nav-link :href="route('orders.index')" :active="request()->routeIs('orders.index')">
                        Заказы
                    </x-nav-link>
                    <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')">
                        Пользователи
                    </x-nav-link>
                    <x-nav-link :href="route('export.subscribers')" :active="request()->routeIs('export.subscribers')">
                        Скачать список подписчиков
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                Выйти
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                Главная
            </x-responsive-nav-link>
            <x-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.index')">
                Категории
            </x-nav-link>
            <x-nav-link :href="route('products.index')" :active="request()->routeIs('products.index')">
                Товары
            </x-nav-link>
            <x-nav-link :href="route('colors.index')" :active="request()->routeIs('colors.index')">
                Цвета
            </x-nav-link>
            <x-nav-link :href="route('sizes.index')" :active="request()->routeIs('sizes.index')">
                Размеры
            </x-nav-link>
            <x-nav-link :href="route('articles.index')" :active="request()->routeIs('articles.index')">
                Статьи
            </x-nav-link>
            <x-nav-link :href="route('sliders.index')" :active="request()->routeIs('sliders.index')">
                Слайдеры
            </x-nav-link>
            <x-nav-link :href="route('banners.index')" :active="request()->routeIs('banners.index')">
                Баннеры
            </x-nav-link>
            <x-nav-link :href="route('orders.index')" :active="request()->routeIs('orders.index')">
                Заказы
            </x-nav-link>
            <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')">
                Пользователи
            </x-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                <div class="flex-shrink-0">
                    <svg class="h-10 w-10 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>

                <div class="ml-3">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        Выйти
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>