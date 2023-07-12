<x-layout>

  <h1
    class='my-4 font-bold w-full flex justify-center items-center'>
    Tags
  </h1>

  <section
      class='flex flex-col justify-start items-center'>

    @isset($tags)

      @foreach($tags as $tag)

        <a
          href='/music/tags/{{$tag}}'>
          {{$tag}}</a>

      @endforeach

    @endisset

  </section>

</x-layout>