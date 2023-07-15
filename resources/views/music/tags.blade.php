<x-layout>

  <section
      class='w-full h-full flex flex-wrap m-2 p-2'>

    @isset($tags)

      @foreach($tags as $tag)

        <a
          class='m-4 p-4'
          href='/music/tags/{{$tag->id}}'>
          {{$tag->name}}</a>

      @endforeach

    @endisset

  </section>

</x-layout>