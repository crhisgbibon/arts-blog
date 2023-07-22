<x-layout>

  <div
    class='w-full flex flex-col justify-start items-center mt-4 mb-8'>

    <nav
    class='flex flex-col sm:flex-row justify-start sm:justify-around items-center w-11/12 max-w-6xl mx-auto'>

      <a
        class='m-2 font-bold w-full sm:w-1/3 flex justify-center sm:justify-start items-center'
        href='/{{$artist->id}}'>
        {{$artist->name}}</a>

      <p
        class='m-2 font-bold w-full sm:w-1/3 flex justify-center sm:justify-start sm:justify-center items-center'>
        {{$record->name}}</p>

      <a
        href='/year/{{$record->release_year}}'
        class='m-2 font-bold w-full sm:w-1/3 flex justify-center sm:justify-start sm:justify-end items-center'>
        {{$record->release_year}}</a>

    </nav>

    <section
      class='flex flex-col justify-start items-center w-11/12 max-w-xl'>

      <h1
        class='my-4 font-bold'>
        Stars</h1>

      <div
        class='flex flex-row justify-center items-center w-full'>

        @isset($record->stars)

          @for($i = 0; $i < $record->stars; $i++)
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
        {{$record->review}}
      </article>

    </section>

    <section
      class='flex flex-col justify-start items-center w-11/12 max-w-xl'>

      <h1
        class='w-full m-4 font-bold flex justify-center items-center'>
        Tracks</h1>

      @isset($tracks)

        @foreach($tracks as $track)

          <div
            class='flex flex-row justify-start items-center my-2 mx-4 w-full'>

            <p
              class='mr-2'>
              {{$track->pos}}.
            </p>
    
            <a
              class='flex justify-start items-center w-full'
              href='/{{$artist->id}}/{{$record->id}}/{{$track->id}}'>
              {{$track->name}}</a>

            <div
              class='flex flex-row justify-end items-center mr-8'>
        
              @isset($record->stars)
        
                @for($i = 0; $i < $track->stars; $i++)
                  <div
                    class='mx-2'>
                    &#9733;</div>
                @endfor
            
              @endisset
        
            </div>

          </div>
    
        @endforeach
    
      @endisset

    </section>

    <section
      class='flex flex-col justify-start items-center w-11/12 max-w-xl'>

      <h1
        class='w-full m-4 font-bold flex justify-center items-center'>
        Tags</h1>

      @isset($tags)

        @foreach($tags as $tag)

          <div
            class='flex flex-row justify-start items-center my-2 mx-4 w-full'>

            <a
              href='/tags/{{$tag->tag_id}}'
              class='mr-2'>
              {{$tag->name}}
            </a>

          </div>
    
        @endforeach
    
      @endisset

    </section>

  </div>

</x-layout>