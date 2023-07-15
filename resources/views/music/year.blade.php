<x-layout>

  <h1
    class='w-full flex justify-center items-center m-2 p-2 font-bold'>
    {{$year}}
  </h1>

  <section
    class='flex flex-col justify-start items-center'>

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

</x-layout>