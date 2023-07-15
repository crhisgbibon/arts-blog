<x-layout>

  <nav
    class='w-full flex flex-row justify-start items-center my-2 px-2'>

    <a
      href='/music/tags'
      class='flex justify-center items-center mx-2'>
      Tags</a>

    <div
      class='mx-2'>
      /</div>

    <h1
      class='flex justify-center items-center mx-2 font-bold'>
      {{$tag->name}}</h1>

  </nav>

  <div
    class='w-full flex flex-col sm:flex-row justify-around items-center sm:items-start'>

    <section
      class='flex flex-col justify-start items-center'>

      <h1
        class='my-4 font-bold'>
        Artists</h1>

      @isset($artists)

        @foreach($artists as $artist)

          <a
            class='my-2'
            href='/music/{{$artist->id}}'>
            {{$artist->name}}
          </a>

        @endforeach

      @endisset

    </section>

    <section
      class='flex flex-col justify-start items-center'>

      <h1
        class='my-4 font-bold'>
        Records</h1>

      @isset($records)

        @foreach($records as $record)

          <div
            class='w-full flex flex-row justify-around items-center'>

            <a
              class='m-2'
              href='/music/{{$record->artist_id}}/{{$record->id}}'>
              {{$record->name}}
            </a>

            <a
              class='m-2'
              href='/music/year/{{$record->release_year}}'>
              {{$record->release_year}}
            </a>

          </div>

        @endforeach

      @endisset

    </section>

    <section
      class='flex flex-col justify-start items-center'>

      <h1
        class='my-4 font-bold'>
        Tracks</h1>

      @isset($tracks)

        @foreach($tracks as $track)

          <a
            class='my-2'
            href='/music/{{$track->artist_id}}/{{$track->record_id}}/{{$track->id}}'>
            {{$track->name}}
          </a>

        @endforeach

      @endisset

    </section>

  </div>

</x-layout>