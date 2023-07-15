<x-layout>

  <h1
    class='w-full flex flex-col sm:flex-row justify-center items-center m-2 p-2'>

    <p
      class='m-2 p-2 font-bold'>
      Artists</p>

      <input
        class='rounded-lg m-2 p-2'
        placeholder='Search...'
        type='text'
        onkeyup='Filter(this.value)'>

  </h1>

  <section
    class='w-full h-full flex flex-wrap m-2 p-2'>

    @isset($artists)

      @foreach($artists as $artist)

        <a
          data-value='{{$artist->name}}'
          class='search m-4 p-4'
          href='/music/{{$artist->id}}'>
          {{$artist->name}}
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