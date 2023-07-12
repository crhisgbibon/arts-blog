<x-layout>

  <nav
    class='w-full flex flex-row justify-start items-center my-2 px-2'>

    <a
        class='mx-2'
        href='/music/'>
      Music</a>

      <div
        class='mx-2'>
        /</div>

      <a
        class='mx-2'
        href='/music/{{$artist->id}}'>
      {{$artist->name}}</a>

  </nav>

  <div
    class='flex flex-col justify-start items-center'>

    <h1
      class='my-4 font-bold'>
      Records</h1>

    @isset($records)

      @foreach($records as $record)

        <a
          href='/music/{{$artist->id}}/{{$record->id}}'>
          {{$record->name}}</a>

      @endforeach

    @endisset

    <h1
      class='my-4 font-bold'>
      Influences</h1>

    @isset($influences)

      @foreach($influences as $influence)

        <a
          href='/music/{{$influence->id}}'>
          {{$influence->name}}</a>

      @endforeach

    @endisset

    <h1
      class='my-4 font-bold'>
      Influenced</h1>

    @isset($influenced)

      @foreach($influenced as $influence)

        <a
          href='/music/{{$influence->id}}'>
          {{$influence->name}}</a>

      @endforeach

    @endisset

    <h1
      class='my-4 font-bold'>
      Similar</h1>

    @isset($similars)

      @foreach($similars as $similar)

        <a
          href='/music/{{$similar->id}}'>
          {{$similar->name}}</a>

      @endforeach

    @endisset

  </div>

</x-layout>