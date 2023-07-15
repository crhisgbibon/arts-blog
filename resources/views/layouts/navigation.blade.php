<nav x-data="{ open: false }" class="border-b border-black">

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-12">
      <div class="flex">

        <div class="shrink-0 flex items-center">

        </div>

        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">

          <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
            {{ __('Home') }}
          </x-nav-link>

          <x-nav-link :href="route('music')" :active="request()->routeIs('music')">
            {{ __('Music') }}
          </x-nav-link>

          @can('is_admin')
            <x-nav-link :href="route('author_music')" :active="request()->routeIs('author_music')">
              {{ __('Auth_Music') }}
            </x-nav-link>
          @endcan
          
        </div>

      </div>

      @can('is_admin')

        <div class="hidden sm:flex sm:items-center sm:ml-6">
          <x-dropdown align="right" width="48">
            <x-slot name="trigger">
              <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md bg-white focus:outline-none transition ease-in-out duration-150">
                <div>{{ Auth::user()->name }}</div>

                <div class="ml-1">
                  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
                </div>
              </button>
            </x-slot>

            <x-slot name="content">

              <x-dropdown-link :href="route('profile.edit')">
                {{ __('Profile') }}
              </x-dropdown-link>

              <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')"
                  onclick="event.preventDefault();
                  this.closest('form').submit();">
                  {{ __('Log Out') }}
                </x-dropdown-link>
              </form>

            </x-slot>

          </x-dropdown>

        </div>
      @endcan

      <div class="-mr-2 flex items-center sm:hidden">

        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
          
          <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>

        </button>

      </div>

    </div>

  </div>

  <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">

    <div class="pt-2 pb-3 space-y-1">

      <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
        {{ __('Home') }}
      </x-responsive-nav-link>

      <x-responsive-nav-link :href="route('music')" :active="request()->routeIs('music')">
        {{ __('Music') }}
      </x-responsive-nav-link>

      @can('is_admin')

        <x-responsive-nav-link :href="route('author_music')" :active="request()->routeIs('author_music')">
          {{ __('Auth_Music') }}
        </x-responsive-nav-link>

      @endcan

    </div>

    @can('is_admin')

      <div class="pt-4 pb-1 border-t border-gray-200">

        <div class="px-4">
          <div class="font-medium text-base">{{ Auth::user()->name }}</div>
          <div class="font-medium text-sm">{{ Auth::user()->email }}</div>
        </div>

        <div class="mt-3 space-y-1">

          <x-responsive-nav-link :href="route('profile.edit')">
            {{ __('Profile') }}
          </x-responsive-nav-link>

          <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-responsive-nav-link :href="route('logout')"
              onclick="event.preventDefault();
              this.closest('form').submit();">
              {{ __('Log Out') }}
            </x-responsive-nav-link>
          </form>

        </div>

      </div>

    @endcan

  </div>
</nav>
