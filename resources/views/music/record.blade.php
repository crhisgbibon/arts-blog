<x-layout>

  Record Page

  <a
    href='/music/{{$artist->id}}'>
  {{$artist->name}}</a>

  <a
    href='/music/{{$artist->id}}/{{$record->id}}'>
  {{$record->name}}</a>

  @isset($tracks)

    @foreach($tracks as $track)

      <a
        href='/music/{{$artist->id}}/{{$record->id}}/{{$track->id}}'>
        {{$track->name}}</a>

    @endforeach

  @endisset

</x-layout>