<x-layout>

  <h1
    class='w-full flex justify-center items-center m-2 p-2 font-bold'>
    Tags
  </h1>

  <section
    class='w-full h-full flex flex-wrap m-2 p-2'>

    @isset($tags)

      @foreach($tags as $tag)

        <a
          class='m-4 p-4'
          href='/tags/{{$tag->id}}'>
          {{$tag->name}}
        </a>

      @endforeach

    @endisset

  </section>

</x-layout>