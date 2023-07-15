<x-layout>

  <h1
    class='w-full flex justify-center items-center m-2 p-2 font-bold'>
    Stars
  </h1>

  <section
    class='w-full h-full flex flex-wrap m-2 p-2'>

    @isset($records)

      @for($i = 5; $i > 0; $i--)

        <a
          class='m-4 p-4'
          href='/music/stars/{{$i}}'>
          {{$i}} Stars
        </a>

      @endfor

    @endisset

  </section>

</x-layout>