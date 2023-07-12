<x-layout>

  Track Page

  <a
    href='/music/{{$artist->id}}'>
  {{$artist->name}}</a>

  <a
    href='/music/{{$artist->id}}/{{$record->id}}'>
  {{$record->name}}</a>

  <a
    href='/music/{{$artist->id}}/{{$record->id}}/{{$track->id}}'>
  {{$track->name}}</a>

</x-layout>