<x-layout>

  <nav
    class='w-full flex flex-row justify-start items-center my-2 px-2'>

    <a
      href='/music/tags'
      class='flex justify-center items-center mx-2'>
      Tags</a>

    <div
      class='mx-2'>
      /</div>

    <a
      href='/music'
      class='flex justify-center items-center mx-2'>
      Music</a>

  </nav>

  <section
      class='w-full h-full flex flex-col justify-start items-start m-2 p-2'>

    @isset($tags)

      @foreach($tags as $tag)

        <a
          class='my-2'
          href='/music/tags/{{$tag->id}}'>
          {{$tag->name}}</a>

      @endforeach

    @endisset

  </section>

</x-layout>