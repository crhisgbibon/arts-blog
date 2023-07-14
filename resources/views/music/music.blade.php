<x-layout>

  <nav
    class='w-full flex flex-row justify-start items-center my-2 px-2'>

    <a
      href='/music'
      class='flex justify-center items-center mx-2'>
      Music</a>

    <div
      class='mx-2'>
      /</div>

    <a
      href='/music/tags'
      class='flex justify-center items-center mx-2'>
      Tags</a>

  </nav>

  <div
    class='w-full flex justify-center items-center my-2 font-bold'>
    Latest</div>

  <div
    class='w-full flex flex-col md:flex-row justify-around items-center md:items-start'>

    <section
      class='flex flex-col justify-start items-center'>

      <h1
        class='my-4 font-bold'>
        Artists</h1>

      @isset($artists)

        @foreach($artists as $artist)

          <a
            class='my-2'
            href='/music/{{$artist->id}}'>
            {{$artist->name}}
          </a>

        @endforeach

      @endisset

    </section>

    <section
      class='flex flex-col justify-start items-center'>

      <h1
        class='my-4 font-bold'>
        Records</h1>

      @isset($records)

        @foreach($records as $record)

          <a
            class='my-2'
            href='/music/{{$record->artist_id}}/{{$record->id}}'>
            {{$record->name}}
          </a>

        @endforeach

      @endisset

    </section>

    <section
      class='flex flex-col justify-start items-center'>

      <h1
        class='my-4 font-bold'>
        Tracks</h1>

      @isset($tracks)

        @foreach($tracks as $track)

          <a
            class='my-2'
            href='/music/{{$track->artist_id}}/{{$track->record_id}}/{{$track->id}}'>
            {{$track->name}}
          </a>

        @endforeach

      @endisset

    </section>

  </div>

  <div
    class='flex flex-col justify-start items-center'>

    <h1
      class='w-full flex justify-center items-center font-bold m-2 p-2'>a-z</h1>

    <section
      class='flex flex-wrap justify-center items-center'>

      <a
        href='/music/a'
        class='m-2 flex justify-center items-center p-2'>
        a
      </a>

      <a
        href='/music/b'
        class='m-2 flex justify-center items-center p-2'>
        b
      </a>

      <a
        href='/music/c'
        class='m-2 flex justify-center items-center p-2'>
        c
      </a>

      <a
        href='/music/d'
        class='m-2 flex justify-center items-center p-2'>
        d
      </a>

      <a
        href='/music/e'
        class='m-2 flex justify-center items-center p-2'>
        e
      </a>

      <a
        href='/music/f'
        class='m-2 flex justify-center items-center p-2'>
        f
      </a>

      <a
        href='/music/g'
        class='m-2 flex justify-center items-center p-2'>
        g
      </a>

      <a
        href='/music/h'
        class='m-2 flex justify-center items-center p-2'>
        h
      </a>

      <a
        href='/music/i'
        class='m-2 flex justify-center items-center p-2'>
        i
      </a>

      <a
        href='/music/j'
        class='m-2 flex justify-center items-center p-2'>
        j
      </a>

      <a
        href='/music/k'
        class='m-2 flex justify-center items-center p-2'>
        k
      </a>

      <a
        href='/music/l'
        class='m-2 flex justify-center items-center p-2'>
        l
      </a>

      <a
        href='/music/m'
        class='m-2 flex justify-center items-center p-2'>
        m
      </a>

      <a
        href='/music/n'
        class='m-2 flex justify-center items-center p-2'>
        n
      </a>

      <a
        href='/music/o'
        class='m-2 flex justify-center items-center p-2'>
        o
      </a>

      <a
        href='/music/p'
        class='mx-2 flex justify-center items-center p-2'>
        p
      </a>

      <a
        href='/music/q'
        class='m-2 flex justify-center items-center p-2'>
        q
      </a>

      <a
        href='/music/r'
        class='m-2 flex justify-center items-center p-2'>
        r
      </a>

      <a
        href='/music/s'
        class='m-2 flex justify-center items-center p-2'>
        s
      </a>

      <a
        href='/music/t'
        class='m-2 flex justify-center items-center p-2'>
        t
      </a>

      <a
        href='/music/u'
        class='m-2 flex justify-center items-center p-2'>
        u
      </a>

      <a
        href='/music/v'
        class='mx-2 flex justify-center items-center p-2'>
        v
      </a>

      <a
        href='/music/w'
        class='m-2 flex justify-center items-center p-2'>
        w
      </a>

      <a
        href='/music/x'
        class='m-2 flex justify-center items-center p-2'>
        x
      </a>

      <a
        href='/music/y'
        class='m-2 flex justify-center items-center p-2'>
        y
      </a>

      <a
        href='/music/z'
        class='m-2 flex justify-center items-center p-2'>
        z
      </a>

    </section>

  </div>

</x-layout>