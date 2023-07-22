<div
  x-data="{ open: false }"
  class='w-full flex flex-col justify-start items-center'>

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
        x-on:click="open = ! open"
        class='m-2 py-2 px-4 rounded-lg border border-black'>
        +
      </button>

    </div>

  </div>

  <div
    x-show="open"
    class='w-full flex flex-col justify-center items-center'>

    <div
      class='flex flex-col justify-start items-center w-full'>

      <label
        class='mx-2'
        for='create_name'>
        Artist:</label>

      <input
        class='mx-2 rounded-lg border border-black p-2 w-10/12 max-w-lg'
        wire:model="create_filter_artist"
        wire:keyup="create_filter_artist"
        type='text'>

      <select
        size=5
        class='rounded-lg m-2 w-10/12 max-w-lg'
        wire:model="create_artist_id"
        wire:change="FillExisting">
        @isset($artists)
          @foreach($artists as $artist)
            <option value='{{$artist->id}}'>{{$artist->name}}</option>
          @endforeach
        @endisset
      </select>

    </div>

    <div
      class='flex flex-col justify-start items-center'>
      @isset($existing)
        @foreach($existing as $exists)
          @if(is_array($exists))
            <div>{{$exists['name']}} - {{$exists['release_year']}} - {{$exists['stars']}}</div>
          @else
            <div>{{$exists->name}} - {{$exists->release_year}} - {{$exists->stars}}</div>
          @endif
        @endforeach
      @endisset
    </div>

    <div
      class='flex flex-row justify-center items-center w-full'>

      <label
        class='mx-2'
        for='create_name'>
        Name:</label>

      <input
        class='mx-2 rounded-lg border border-black p-2 w-10/12 max-w-lg'
        wire:model="create_name"
        type='text'
        value=''>

    </div>

    <div
      class='flex flex-row justify-center items-center w-full'>

      <label
        class='mx-2'
        for='create_year'>
        Year:</label>

      <input
        wire:model="create_year"
        class='mx-2 rounded-lg border border-black p-2  m-2 w-10/12 max-w-lg'
        type='number'
        min=0
        step=1>

    </div>

    <div
      class='flex flex-row justify-center items-center w-full'>

      <label
        class='mx-2'
        for='create_stars'>
        Stars:</label>

      <input
        wire:model="create_stars"
        class='mx-2 rounded-lg border border-black p-2  m-2 w-10/12 max-w-lg'
        type='number'
        min=1
        max=5
        step=1>

    </div>

    <div
      class='flex flex-col justify-start items-center w-full'>

      <label
        class='mx-2'
        for='create_stars'>
        Review:</label>

      <textarea
        wire:model="create_review"
        class='mx-2 rounded-lg border border-black p-2  m-2 w-10/12 max-w-lg'
        maxLength=6666
        rows="4" cols="50"></textarea>

    </div>

    <div
      class='flex flex-col justify-start items-center w-full'>

      <label
        class='mx-2'
        for='create_stars'>
        Tags:</label>

      <select
        multiple
        size=10
        class='rounded-lg m-2 w-10/12 max-w-lg'
        wire:model="create_tags">
        @isset($tags)
          @foreach($tags as $tag)
            <option value='{{$tag->id}}'>{{$tag->name}}</option>
          @endforeach
        @endisset
      </select>

    </div>

    <div
      class='w-10/12 flex flex-row justify-center items-center my-2 max-w-lg'>

      <button
        class='rounded-lg border border-black w-1/3 mx-2'
        wire:click="create">
        Create
      </button>

    </div>
    
  </div>

  @if($search)

    <div
      x-show="!open"
      class='w-full flex flex-wrap'>
    
      @isset($search_result)

        @foreach($search_result as $result)

          <button
            wire:click="edit({{$result->id}})"
            class='m-2 p-2 rounded-lg border border-black'>
            {{$result->name}}
          </button>

        @endforeach

      @endisset

    </div>

  @else

    <div
      x-show="!open"
      class='w-10/12 mx-auto flex flex-col justify-center items-center max-w-lg'>

      <input
        class='m-2 rounded-lg border border-black p-2 w-full'
        type='number'
        hidden
        wire:model="result_record_id">

      <select
        size=5
        class='rounded-lg m-2 w-10/12 max-w-lg'
        wire:model="result_artist_id">
        @isset($artists)
          @foreach($artists as $artist)
            <option value='{{$artist->id}}'>{{$artist->name}}</option>
          @endforeach
        @endisset
      </select>

      <label
        for='result_name'>
        Name:</label>

      <input
        class='my-2 mx-auto rounded-lg border border-black p-2 w-full'
        type='text'
        wire:model="result_name">

      <input
        wire:model="result_year"
        class='mx-2 rounded-lg border border-black p-2  m-2 w-10/12'
        type='number'
        min=0
        step=1>

      <input
        wire:model="result_stars"
        class='mx-2 rounded-lg border border-black p-2  m-2 w-10/12'
        type='number'
        min=1
        max=5
        step=1>

      <textarea
        wire:model="result_review"
        class='mx-2 rounded-lg border border-black p-2  m-2 w-10/12'
        maxLength=6666
        rows="4" cols="50"></textarea>

      <select
        multiple
        size=10
        class='rounded-lg m-2 w-10/12 max-w-lg'
        wire:model="result_tags">
        @isset($tags)
          @foreach($tags as $tag)
            <option value='{{$tag->id}}'>{{$tag->name}}</option>
          @endforeach
        @endisset
      </select>

      <div
        class='w-full flex flex-row justify-center items-center my-2'>

        <button
          class='rounded-lg border border-black w-1/3 mx-2'
          wire:click="update">
          Update
        </button>

        <button
          class='rounded-lg border border-black w-1/3 mx-2'
          wire:click="delete">
          Delete
        </button>

      </div>
      
    </div>

  @endif

</div>