<x-layout>

  <section
    class='w-full flex flex-row justify-around items-center my-2'>

    <a
      href='/music/letter'
      class='w-full flex justify-center items-center font-bold'>
      A-Z</a>

    <a
      href='/music/stars'
      class='w-full flex justify-center items-center font-bold'>
      Stars</a>

    <a
      href='/music/tags'
      class='w-full flex justify-center items-center font-bold'>
      Tags</a>

    <a
      href='/music/year'
      class='w-full flex justify-center items-center font-bold'>Years</a>

  </section>

  <div
    class='w-full flex flex-col sm:flex-row justify-around items-center sm:items-start max-w-6xl mx-auto'>

    <section
      class='flex flex-col justify-start items-center w-10/12 sm:w-1/3 mx-2'>

      <a
        href='/music/artists'
        class='my-4 font-bold'>
        Artists</a>

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

      <a
        href='/music/records'
        class='my-4 font-bold'>
        Records</a>

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

      <a
        href='music/tracks'
        class='my-4 font-bold'>
        Tracks</a>

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