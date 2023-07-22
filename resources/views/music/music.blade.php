<x-layout>

  <section
    class='w-full flex flex-row justify-around items-center my-2'>

    <x-nav-link
      class='w-full flex justify-center items-center font-bold'
      :href="route('music_letters')"
      :active="request()->routeIs('music_letters')">
      {{ __('A-Z') }}
    </x-nav-link>

    <x-nav-link
      class='w-full flex justify-center items-center font-bold'
      :href="route('music_stars')"
      :active="request()->routeIs('music_stars')">
      {{ __('Stars') }}
    </x-nav-link>

    <x-nav-link
      class='w-full flex justify-center items-center font-bold'
      :href="route('music_tags')"
      :active="request()->routeIs('music_tags')">
      {{ __('Tags') }}
    </x-nav-link>

    <x-nav-link
      class='w-full flex justify-center items-center font-bold'
      :href="route('music_years')"
      :active="request()->routeIs('music_years')">
      {{ __('Years') }}
    </x-nav-link>

  </section>

  <div
    class='w-full flex flex-col sm:flex-row justify-around items-center sm:items-start max-w-6xl mx-auto'>

    <section
      class='flex flex-col justify-start items-center w-10/12 sm:w-1/3 mx-2'>

      <x-nav-link
        class='my-4 font-bold'
        :href="route('music_artists')"
        :active="request()->routeIs('music_artists')">
        {{ __('Artists') }}
      </x-nav-link>

      @isset($artists)

        @foreach($artists as $artist)

        <div
          class='flex flex-col justify-start items-center w-full'>

          <a
            class='m-2 p-2 flex justify-start items-center w-10/12'
            href='/music/{{$artist->id}}'>
            {{$artist->name}}
          </a>

          <p
            class='text-xs text-slate-400 mx-2 px-2 flex justify-start items-center w-10/12'>
            {{date('d/m/Y', strtotime($artist->updated_at))}}
          </p>

        </div>

        @endforeach

      @endisset

    </section>

    <section
      class='flex flex-col justify-start items-center w-10/12 sm:w-1/3 mx-2'>

      <x-nav-link
        class='my-4 font-bold'
        :href="route('music_records')"
        :active="request()->routeIs('music_records')">
        {{ __('Records') }}
      </x-nav-link>

      @isset($records)

        @foreach($records as $record)

          <div
            class='flex flex-col justify-start items-center w-full'>

            <a
              class='m-2 p-2 flex justify-start items-center w-10/12'
              href='/music/{{$record->artist_id}}/{{$record->id}}'>
              {{$record->name}}
            </a>

            <p
              class='text-xs text-slate-400 mx-2 px-2 flex justify-start items-center w-10/12'>
              {{date('d/m/Y', strtotime($record->updated_at))}}
            </p>

          </div>

        @endforeach

      @endisset

    </section>

    <section
      class='flex flex-col justify-start items-center w-10/12 sm:w-1/3 mx-2'>

      <x-nav-link
        class='my-4 font-bold'
        :href="route('music_tracks')"
        :active="request()->routeIs('music_tracks')">
        {{ __('Tracks') }}
      </x-nav-link>

      @isset($tracks)

        @foreach($tracks as $track)

          <div
            class='flex flex-col justify-start items-center w-full'>

            <a
              class='m-2 p-2 flex justify-start items-center w-10/12'
              href='/music/{{$track->artist_id}}/{{$track->record_id}}/{{$track->id}}'>
              {{$track->name}}
            </a>

            <p
              class='text-xs text-slate-400 mx-2 px-2 flex justify-start items-center w-10/12'>
              {{date('d/m/Y', strtotime($track->updated_at))}}
            </p>

          </div>

        @endforeach

      @endisset

    </section>

  </div>

</x-layout>