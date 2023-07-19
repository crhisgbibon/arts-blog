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

    <input
      class='my-2 mx-auto rounded-lg border border-black p-2 w-10/12 max-w-lg'
      wire:model="create_name"
      type='text'
      value=''>

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
    
      @isset($search_results)

        @foreach($search_results as $result)

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
        wire:model="edit_id">

      <input
        class='my-2 mx-auto rounded-lg border border-black p-2 w-full'
        type='text'
        wire:model="edit_name">

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