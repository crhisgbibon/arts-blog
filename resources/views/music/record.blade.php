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

    <div
      class='mx-2'>
      /</div>

    <a
      class='mx-2'
      href='/music/{{$artist->id}}/{{$record->id}}'>
    {{$record->name}}</a>

  </nav>

  <div
    class='flex flex-col justify-start items-center'>

    <h1
      class='my-4 font-bold'>
      Tracks</h1>

    @isset($tracks)

      @foreach($tracks as $track)
  
        <a
          href='/music/{{$artist->id}}/{{$record->id}}/{{$track->id}}'>
          {{$track->name}}</a>
  
      @endforeach
  
    @endisset

  </div>

</x-layout>