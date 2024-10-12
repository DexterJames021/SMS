  <!-- sidebar -->
  <nav
    class="absolute inset-0 transform lg:transform-none lg:opacity-100 duration-200 lg:relative z-10 w-80 bg-indigo-900 text-white h-auto p-3"
    :class="{'translate-x-0 ease-in opacity-100': open === true, '-translate-x-full ease-out opacity-0': open === false}">
    
    <div class="flex justify-between">
      <span class="font-bold text-2xl sm:text-3xl p-2">ASLY</span>
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
          <x-nav-link :href="route('admin.index')" :active="request()->routeIs('admin.index')">
            Dashboard
          </x-nav-link>
      </li>
      <li class="p-5 hover:bg-indigo-800">
          <x-nav-link :href="route('students.index')" :active="request()->routeIs('students.index')">
            Student Management
          </x-nav-link>
      </li>
      <li class="p-5 hover:bg-indigo-800">
          <x-nav-link :href="route('admin.index')" :active="request()->routeIs('admin.index')">
            test column
          </x-nav-link>
      </li>
    </ul>
  </nav>