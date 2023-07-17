<x-app-layout>

  <div
    class='w-full flex flex-col justify-start items-center'>

    @can('is_admin')
      @livewire('music-search-artists')
    @endcan

  </div>

</x-app-layout>