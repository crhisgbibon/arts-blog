<section
  class='w-full flex flex-wrap'>

  <div
    class='w-full flex flex-col justify-start items-center'>

    <div
      class='w-11/12 flex flex-row justify-center items-center'>

      <input
        wire:model.debounce.300ms="input"
        wire:keyup="search"
        class='my-2 rounded-lg w-11/12 max-w-lg'
        type="text">

      <button
        class='m-2 p-2 rounded-lg border border-black'>
        +
      </button>

    </div>

  </div>

  @isset($artists_search)

    @foreach($artists_search as $artist_search)

      <button
        class='m-2 p-2 rounded-lg border border-black'>
        {{$artist_search->name}}
      </button>

    @endforeach

    <article
      class='w-full flex flex-col justify-center items-center'>

      <input
        class='m-2 rounded-lg border border-black p-2 w-10/12 max-w-lg'
        type='text'
        value='{{$artist_search->name}}'>

      <label
        class='my-2 w-10/12 flex justify-center items-center'
        for="artist_influences_{{$artist_search->id}}">
        Influences:</label>

      <select
        multiple
        size=10
        class='m-2 w-10/12 max-w-lg'
        id='artist_influences_{{$artist_search->id}}'>
        @isset($artists_all)
          @foreach($artists_all as $artist_all)
            <option
            
            @foreach($influences as $in)
              @if($in->artist_id === $artist_search->id &&
                  $in->influence_id === $artist_all->id)
                selected
              @endif
            @endforeach
            
            value='{{$artist_all->id}}'>{{$artist_all->name}}</option>
          @endforeach
        @endisset
      </select>

      <label
        class='my-2 w-10/12 flex justify-center items-center'
        for="artist_similar_{{$artist_search->id}}">
        Similar:</label>

      <select
        multiple
        size=10
        class='m-2 w-10/12 max-w-lg'
        id='artist_similar_{{$artist_search->id}}'>
        @isset($artists_all)
          @foreach($artists_all as $artist_all)
            <option
            
            @foreach($similar as $sim)
              @if($sim->artist_id === $artist_search->id &&
                  $sim->similar_id === $artist_all->id)
                selected
              @endif
            @endforeach
            
            value='{{$artist_all->id}}'>{{$artist_all->name}}</option>
          @endforeach
        @endisset
      </select>

      <div
        class='w-10/12 flex flex-row justify-center items-center my-2'>

        <button
          onclick='edit_music_artist({{$artist_search->id}})'
          class='rounded-lg border border-black w-1/3 mx-2'>
          Update
        </button>

        <button
          onclick='delete_music_artist({{$artist_search->id}})'
          class='rounded-lg border border-black w-1/3 mx-2'>
          Delete
        </button>

      </div>
      
    </article>

  @endisset

</section>