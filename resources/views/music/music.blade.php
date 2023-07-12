<x-layout>

  <div
    class='w-full flex justify-center items-center my-2 font-bold'>
    Music</div>

  <div
    class='w-full flex justify-center items-center my-2 font-bold'>
    Latest Updates</div>

  <div
    class='w-full flex flex-col md:flex-row justify-around items-center md:items-start'>

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

          <a
            class='my-2'
            href='/music/{{$record->artist_id}}/{{$record->id}}'>
            {{$record->name}}
          </a>

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