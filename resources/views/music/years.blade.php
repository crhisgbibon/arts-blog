<x-layout>

  <h1
    class='w-full flex justify-center items-center m-2 p-2 font-bold'>
    Years
  </h1>

  <section
    class='w-full h-full flex flex-wrap m-2 p-2'>

    @isset($years)

      @foreach($years as $year)

        <a
          class='m-4 p-4'
          href='/years/{{$year}}'>
          {{$year}}
        </a>

      @endforeach

    @endisset

  </section>

</x-layout>