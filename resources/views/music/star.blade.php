<x-layout>

  <nav
    class='flex flex-row justify-center items-center w-full'>

    <h1
      class='flex justify-center items-center m-2 p-2 font-bold'>
      {{$star}}
    </h1>

    <a
      href='/music/stars'
      class='flex justify-center items-center m-2 p-2 font-bold'>
      Stars
    </a>

  </nav>

  <section
    class='w-full h-full flex flex-wrap m-2 p-2'>

    @isset($records)

      @foreach($records as $record)

        <a
          class='m-4 p-4'
          href='/music/{{$record->artist_id}}/{{$record->id}}'>
          {{$record->name}}
        </a>

      @endforeach

    @endisset

  </section>

</x-layout>