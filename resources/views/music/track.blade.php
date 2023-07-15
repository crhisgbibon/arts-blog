<x-layout>

  <div
    class='w-full flex flex-col justify-start items-center mt-4 mb-8'>

    <nav
      class='flex flex-col sm:flex-row justify-start sm:justify-around items-center w-11/12 max-w-6xl mx-auto'>

      <p
        class='my-2 font-bold w-10/12 mx-auto flex justify-center items-center'>
        {{$track->name}}</p>

    </nav>

    <nav
      class='flex flex-col sm:flex-row justify-start sm:justify-around items-center w-11/12 max-w-6xl mx-auto'>

      <a
        class='m-2 font-bold w-full sm:w-1/3 flex justify-center sm:justify-start items-center'
        href='/music/{{$artist->id}}'>
        {{$artist->name}}</a>

      <a
        href='/music/{{$artist->id}}/{{$record->id}}'
        class='m-2 font-bold w-full sm:w-1/3 flex justify-center sm:justify-center items-center'>
        {{$record->name}}</a>

      <a
        href='/music/year/{{$record->release_year}}'
        class='m-2 font-bold w-full sm:w-1/3 flex justify-center sm:justify-end items-center'>
        {{$record->release_year}}</a>

    </nav>

    <section
      class='flex flex-col justify-start items-center w-11/12 max-w-xl'>

      <h1
        class='my-4 font-bold'>
        Stars</h1>

      <div
        class='flex flex-row justify-center items-center w-full'>

        @isset($track->stars)

          @for($i = 0; $i < $track->stars; $i++)
            <div
              class='font-bold mx-2'>
              &#9733;</div>
          @endfor
      
        @endisset

      </div>

    </section>

    <section
      class='flex flex-col justify-start items-center w-11/12 max-w-xl'>

      <h1
        class='m-4 font-bold'>
        Review</h1>

      <article
        class='w-full max-h-[500] overflow-y-auto my-2 mx-4'>
        {{$track->review}}
      </article>

    </section>

  </div>

</x-layout>