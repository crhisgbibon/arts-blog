<x-layout>

  <div
    class='flex flex-col justify-start items-center'>

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

      <div
        class='mx-2'>
        /</div>

      <a
        class='mx-2'
        href='/music/{{$artist->id}}/{{$record->id}}/{{$track->id}}'>
      {{$track->name}}</a>

    </nav>

    <a
      href='/music/{{$artist->id}}'>
    {{$artist->name}}</a>

    <a
      href='/music/{{$artist->id}}/{{$record->id}}'>
    {{$record->name}}</a>

    <a
      href='/music/{{$artist->id}}/{{$record->id}}/{{$track->id}}'>
    {{$track->name}}</a>

  </div>

</x-layout>