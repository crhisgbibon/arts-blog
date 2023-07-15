<x-layout>

  <h1
    class='w-full flex justify-center items-center m-2 p-2 font-bold'>
    A-Z
  </h1>

  <section
    class='w-full h-full flex flex-wrap m-2 p-2'>

    @isset($letters)

      @foreach($letters as $letter)

        <a
          class='m-4 p-4'
          href='/music/letter/{{$letter}}'>
          {{$letter}}
        </a>

      @endforeach

    @endisset

  </section>

</x-layout>