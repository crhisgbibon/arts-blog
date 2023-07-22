<x-layout>

  <nav
    class='w-full flex flex-row justify-center items-center my-2 px-2'>

      <p
        class='mx-2 font-bold'>
        {{$artist->name}}</p>

  </nav>

  <div
    class='flex flex-col justify-start items-center w-full'>

    <h1
      class='my-4 font-bold'>
      Records</h1>

    @isset($records)

      @foreach($records as $record)

        <div
          class='w-full flex flex-row justify-between items-center w-11/12 max-w-lg my-2'>

          <a
            class='mx-2 w-full'
            href='/{{$artist->id}}/{{$record->id}}'>
            {{$record->name}}</a>

          <div
            class='flex flex-row justify-end items-center mx-2'>
    
            @isset($record->stars)
    
              @for($i = 0; $i < $record->stars; $i++)
                <div
                  class='font-bold mx-2'>
                  &#9733;</div>
              @endfor
          
            @endisset
    
          </div>

          <a
            class='mx-2 flex justify-end items-center'
            href='/years/{{$record->release_year}}'>
            {{$record->release_year}}</a>

        </div>

      @endforeach

    @endisset

    <div
      class='w-11/12 flex flex-col sm:flex-row justify-start sm:justify-center items-center sm:items-start max-w-lg'>

      <section
        class='w-full sm:w-1/3 flex flex-col justify-start items-center mx-4'>

        <h1
          class='my-4 font-bold w-full flex justify-center items-center h-12'>
          Influences</h1>

        @isset($influences)

          @foreach($influences as $influence)

            <a
              class='m-2 w-full flex justify-start items-center'
              href='/{{$influence->id}}'>
              {{$influence->name}}</a>

          @endforeach

        @endisset

      </section>

      <section
        class='w-full sm:w-1/3 flex flex-col justify-start items-center mx-4'>

        <h1
          class='my-4 font-bold w-full flex justify-center items-center h-12'>
          Influenced</h1>

        @isset($influenced)

          @foreach($influenced as $influence)

            <a
              class='m-2 w-full flex justify-start items-center'
              href='/{{$influence->id}}'>
              {{$influence->name}}</a>

          @endforeach

        @endisset

      </section>

      <section
        class='w-full sm:w-1/3 flex flex-col justify-start items-center mx-4'>

        <h1
          class='my-4 font-bold w-full flex justify-center items-center h-12'>
          Similar</h1>

        @isset($similars)

          @foreach($similars as $similar)

            <a
              class='m-2 w-full flex justify-start items-center'
              href='/{{$similar->id}}'>
              {{$similar->name}}</a>

          @endforeach

        @endisset

      </section>

    </div>

  </div>

</x-layout>