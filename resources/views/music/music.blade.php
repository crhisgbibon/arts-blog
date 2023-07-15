<x-layout>

  <section
    class='flex flex-col justify-start items-center'>

    <h1
      class='w-10/12 flex justify-center items-center font-bold my-2 py-2'>A-Z</h1>

    <div
      class='flex flex-wrap justify-center items-center w-10/12 max-w-xl'>

      <a
        href='/music/letter/-'
        class='m-2 flex justify-center items-center p-2'>
        -
      </a>

      <a
        href='/music/letter/a'
        class='m-2 flex justify-center items-center p-2'>
        a
      </a>

      <a
        href='/music/letter/b'
        class='m-2 flex justify-center items-center p-2'>
        b
      </a>

      <a
        href='/music/letter/c'
        class='m-2 flex justify-center items-center p-2'>
        c
      </a>

      <a
        href='/music/letter/d'
        class='m-2 flex justify-center items-center p-2'>
        d
      </a>

      <a
        href='/music/letter/e'
        class='m-2 flex justify-center items-center p-2'>
        e
      </a>

      <a
        href='/music/letter/f'
        class='m-2 flex justify-center items-center p-2'>
        f
      </a>

      <a
        href='/music/letter/g'
        class='m-2 flex justify-center items-center p-2'>
        g
      </a>

      <a
        href='/music/letter/h'
        class='m-2 flex justify-center items-center p-2'>
        h
      </a>

      <a
        href='/music/letter/i'
        class='m-2 flex justify-center items-center p-2'>
        i
      </a>

      <a
        href='/music/letter/j'
        class='m-2 flex justify-center items-center p-2'>
        j
      </a>

      <a
        href='/music/letter/k'
        class='m-2 flex justify-center items-center p-2'>
        k
      </a>

      <a
        href='/music/letter/l'
        class='m-2 flex justify-center items-center p-2'>
        l
      </a>

      <a
        href='/music/letter/m'
        class='m-2 flex justify-center items-center p-2'>
        m
      </a>

      <a
        href='/music/letter/n'
        class='m-2 flex justify-center items-center p-2'>
        n
      </a>

      <a
        href='/music/letter/o'
        class='m-2 flex justify-center items-center p-2'>
        o
      </a>

      <a
        href='/music/letter/p'
        class='mx-2 flex justify-center items-center p-2'>
        p
      </a>

      <a
        href='/music/letter/q'
        class='m-2 flex justify-center items-center p-2'>
        q
      </a>

      <a
        href='/music/letter/r'
        class='m-2 flex justify-center items-center p-2'>
        r
      </a>

      <a
        href='/music/letter/s'
        class='m-2 flex justify-center items-center p-2'>
        s
      </a>

      <a
        href='/music/letter/t'
        class='m-2 flex justify-center items-center p-2'>
        t
      </a>

      <a
        href='/music/letter/u'
        class='m-2 flex justify-center items-center p-2'>
        u
      </a>

      <a
        href='/music/letter/v'
        class='mx-2 flex justify-center items-center p-2'>
        v
      </a>

      <a
        href='/music/letter/w'
        class='m-2 flex justify-center items-center p-2'>
        w
      </a>

      <a
        href='/music/letter/x'
        class='m-2 flex justify-center items-center p-2'>
        x
      </a>

      <a
        href='/music/letter/y'
        class='m-2 flex justify-center items-center p-2'>
        y
      </a>

      <a
        href='/music/letter/z'
        class='m-2 flex justify-center items-center p-2'>
        z
      </a>

    </div>

  </section>

  <section
    class='flex flex-col justify-start items-center'>

    <h1
      class='w-full flex justify-center items-center font-bold my-2 py-2'>Years</h1>

    <div
      class='flex flex-wrap justify-center items-center w-10/12 max-w-xl'>

      @isset($years)

        @foreach($years as $year)

          <a
            href='/music/year/{{$year->release_year}}'
            class='m-2 flex justify-center items-center p-2'>
            {{$year->release_year}}
          </a>

        @endforeach

      @endisset

      </div>

  </section>

  <section
    class='w-full flex flex-row justify-center items-center my-2'>

    <a
      href='/music/tags'
      class='flex justify-center items-center font-bold'>
      Tags</a>

  </section>

  <div
    class='w-full flex justify-center items-center mt-8 font-bold'>
    Latest</div>

  <div
    class='w-full flex flex-col sm:flex-row justify-around items-center sm:items-start max-w-6xl mx-auto'>

    <section
      class='flex flex-col justify-start items-center w-1/3 mx-2'>

      <h1
        class='my-4 font-bold'>
        Artists</h1>

      @isset($artists)

        @foreach($artists as $artist)

          <a
            class='m-2 p-2 flex justify-start items-center w-full'
            href='/music/{{$artist->id}}'>
            {{$artist->name}}
          </a>

        @endforeach

      @endisset

    </section>

    <section
      class='flex flex-col justify-start items-center w-1/3 mx-2'>

      <h1
        class='my-4 font-bold'>
        Records</h1>

      @isset($records)

        @foreach($records as $record)

          <a
            class='m-2 p-2 flex justify-start items-center w-full'
            href='/music/{{$record->artist_id}}/{{$record->id}}'>
            {{$record->name}}
          </a>

        @endforeach

      @endisset

    </section>

    <section
      class='flex flex-col justify-start items-center w-1/3 mx-2'>

      <h1
        class='my-4 font-bold'>
        Tracks</h1>

      @isset($tracks)

        @foreach($tracks as $track)

          <a
            class='m-2 p-2 flex justify-start items-center w-full'
            href='/music/{{$track->artist_id}}/{{$track->record_id}}/{{$track->id}}'>
            {{$track->name}}
          </a>

        @endforeach

      @endisset

    </section>

  </div>

</x-layout>