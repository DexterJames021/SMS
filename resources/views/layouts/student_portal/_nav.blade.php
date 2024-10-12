<nav x-data="{ open: false }"
    class="absolute inset-0 transform lg:transform-none lg:opacity-100 duration-200 lg:relative z-10 w-80 bg-indigo-900 text-white h-auto p-3"
    :class="{'translate-x-0 ease-in opacity-100': open === true, '-translate-x-full ease-out opacity-0': open === false}">
    <div class="flex justify-between">
      <span class="font-bold text-2xl sm:text-3xl p-2">AITCI</span>
      <button
        class="p-2 focus:outline-none focus:bg-indigo-800 hover:bg-indigo-800 rounded-md lg:hidden"
        @click="open = false">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="h-6 w-6"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor">
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M15 19l-7-7 7-7" />
        </svg>
      </button>
    </div>
    <ul class="mt-8">
      <li class="p-5 hover:bg-indigo-800">
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
          Dashboard
        </x-nav-link>
      </li>
      <li class="p-5 hover:bg-indigo-800">
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
          Enroll
        </x-nav-link>
      </li>
      <li class="p-5 hover:bg-indigo-800">
        <x-nav-link :href="route('module.index')" :active="request()->routeIs('module.index')">
          Module grant
        </x-nav-link>
      </li>
      <li class="p-5 hover:bg-indigo-800">
        <x-nav-link :href="route('module.index')" :active="request()->routeIs('module.index')">
          Profile
        </x-nav-link>
      </li>
      <li class="p-5 hover:bg-indigo-800">
        <x-nav-link :href="route('module.index')" :active="request()->routeIs('module.index')">
          Concern
        </x-nav-link>
      </li>
    </ul>
         <!-- Hamburger -->
         <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
  </nav>