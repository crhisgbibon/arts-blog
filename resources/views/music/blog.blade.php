<x-layout>

  <h1
    class='w-full flex flex-col sm:flex-row justify-center items-center my-2 py-2'>

    <p
      class='mt-2 pt-2 font-bold'>
      Blog</p>

  </h1>

  <section
    class='w-full h-full flex flex-wrap my-2 py-2'>

    @isset($entries)

      @foreach($entries as $entry)

        <article
          class='w-full flex-flex-col justify-start items-center border-b border-gray-200 mb-4 pb-4'>

          <h1
            class='w-10/12 mx-auto font-bold text-lg my-2 py-2 border-b border-gray-400'>
            {{$entry->title}}
          </h1>

          <h4
            class='w-10/12 mx-auto font-bold text-sm my-2 py-2 border-b border-gray-400'>
            {{date('d/m/Y', strtotime($entry->updated_at))}}
          </h4>

          <p
            class='w-10/12 mx-auto'>
            {!! nl2br($entry->contents) !!}
          </p>


        </article>

      @endforeach

    @endisset

  </section>

</x-layout>