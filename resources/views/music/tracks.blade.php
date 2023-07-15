<x-layout>

  <h1
    class='w-full flex flex-col sm:flex-row justify-center items-center m-2 p-2'>

    <p
      class='m-2 p-2 font-bold'>
      Tracks</p>

      <input
        class='rounded-lg m-2 p-2'
        placeholder='Search...'
        type='text'
        onkeyup='Filter(this.value)'>

  </h1>

  <section
    class='w-full h-full flex flex-wrap m-2 p-2'>

    @isset($tracks)

      @foreach($tracks as $track)

        <a
          data-value='{{$track->name}}'
          class='search m-4 p-4'
          href='/music/{{$track->artist_id}}/{{$track->record_id}}/{{$track->id}}'>
          {{$track->name}}
        </a>

      @endforeach

    @endisset

  </section>

  <script>

    function Filter(input)
    {
      let existing = document.getElementsByClassName('search');

      for(let i = 0; i < existing.length; i++)
      {
        let item = existing[i];
        if(item.dataset.value.toLowerCase().includes(input.toLowerCase()))
        {
          item.style.display = '';
        }
        else
        {
          item.style.display = 'none';
        }
      }
    }

  </script>

</x-layout>