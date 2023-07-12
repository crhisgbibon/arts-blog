<x-layout>

  Artist Page

  <a
    href='/music/{{$artist->id}}'>
  {{$artist->name}}</a>

  @isset($records)

    @foreach($records as $record)

      <a
        href='/music/{{$artist->id}}/{{$record->id}}'>
        {{$record->name}}</a>

    @endforeach

  @endisset

</x-layout>