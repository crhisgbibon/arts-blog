<x-app-layout>

  <nav
    class='w-full h-12 flex flex-row justify-around items-center border-b border-black'>

    <button
      id='button_artists_panel'
      class='w-1/4 h-full'
      onclick='Switch("artists_panel")'>
      Artists
    </button>

    <button
      id='button_records_panel'
      class='w-1/4 h-full border-x border-black'
      onclick='Switch("records_panel")'>
      Records
    </button>

    <button
      id='button_tracks_panel'
      class='w-1/4 h-full border-r border-black'
      onclick='Switch("tracks_panel")'>
      Tracks
    </button>

    <button
      id='button_tags_panel'
      class='w-1/4 h-full'
      onclick='Switch("tags_panel")'>
      Tags
    </button>

  </nav>

  <div
    class='w-full flex flex-col justify-start items-center'>

    <!-- CREATE NEW ARTIST -->

    <section
      id='artists_panel'
      class='w-full flex flex-wrap my-2'>

      <div
        class='w-full flex flex-col justify-start items-center border-b border-black mb-2'>

        <div
          class='w-11/12 flex flex-row justify-center items-center'>

          <label
            class='my-2 w-32 flex justify-center items-center'
            for="create_artist_name">
            Name:</label>

          <input
            onkeyup='searchMatches()'
            class='my-2 rounded-lg w-11/12 max-w-lg'
            type="text"
            id="create_artist_name">

        </div>

        <div
          class='w-11/12 flex flex-col justify-center items-center'>

          <label
            class='my-2 w-32 flex justify-center items-center'
            for="create_artist_influences">
            Influences:</label>

          <select
            multiple
            size=10
            class='rounded-lg m-2 w-full max-w-lg'
            id='create_artist_influences'>
            @isset($artists)
              @foreach($artists as $artist)
                <option value='{{$artist->id}}'>{{$artist->name}}</option>
              @endforeach
            @endisset
          </select>

        </div>

        <div
          class='w-11/12 flex flex-col justify-center items-center'>

          <label
            class='my-2 w-32 flex justify-center items-center'
            for="create_artist_similar">
            Similar:</label>

          <select
            multiple
            size=10
            class='rounded-lg m-2 w-full max-w-lg'
            id='create_artist_similar'>
            @isset($artists)
              @foreach($artists as $artist)
                <option value='{{$artist->id}}'>{{$artist->name}}</option>
              @endforeach
            @endisset
          </select>

        </div>

        <x-secondary-button
          onclick='create_music_artist()'
          class='my-4 p-2'>
          Create</x-secondary-button>

      </div>

      @isset($artists)

        @foreach($artists as $artist)

          <h2
            data-value='{{$artist->name}}'
            class='artists w-full md:w-1/2 lg:w-1/3 flex flex-col justify-center items-center my-2 py-2 border-b border-black'>

            <input
              id='artist{{$artist->id}}'
              class='m-2 rounded-lg border border-black p-2 w-10/12 max-w-lg'
              type='text'
              value='{{$artist->name}}'>

            <label
              class='my-2 w-10/12 flex justify-center items-center'
              for="artist_influences_{{$artist->id}}">
              Influences:</label>

            <select
              multiple
              size=10
              class='rounded-lg m-2 w-10/12 max-w-lg'
              id='artist_influences_{{$artist->id}}'>
              @isset($artists)
                @foreach($artists as $artist_instance)
                  <option
                  
                  @foreach($influences as $in)
                    @if($in->artist_id === $artist->id &&
                        $in->influence_id === $artist_instance->id)
                      selected
                    @endif
                  @endforeach
                  
                  value='{{$artist_instance->id}}'>{{$artist_instance->name}}</option>
                @endforeach
              @endisset
            </select>

            <label
              class='my-2 w-10/12 flex justify-center items-center'
              for="artist_similar_{{$artist->id}}">
              Similar:</label>

            <select
              multiple
              size=10
              class='rounded-lg m-2 w-10/12 max-w-lg'
              id='artist_similar_{{$artist->id}}'>
              @isset($artists)
                @foreach($artists as $artist_instance)
                  <option
                  
                  @foreach($similar as $sim)
                    @if($sim->artist_id === $artist->id &&
                        $sim->similar_id === $artist_instance->id)
                      selected
                    @endif
                  @endforeach
                  
                  value='{{$artist_instance->id}}'>{{$artist_instance->name}}</option>
                @endforeach
              @endisset
            </select>

            <div
              class='w-10/12 flex flex-row justify-center items-center my-2'>

              <button
                onclick='edit_music_artist({{$artist->id}})'
                class='rounded-lg border border-black w-1/3 mx-2'>
                Save
              </button>

              <button
                onclick='delete_music_artist({{$artist->id}})'
                class='rounded-lg border border-black w-1/3 mx-2'>
                Delete
              </button>

            </div>
            
          </h2>

        @endforeach

      @endisset

    </section>

    <!-- CREATE NEW RECORD -->

    <section
      id='records_panel'
      class='w-full flex flex-wrap my-2'>

      <div
        class='w-full flex flex-col justify-start items-center border-b border-black mb-2'>

        <div
          class='w-11/12 flex flex-row justify-center items-center'>

          <label
            class='my-2 w-24 flex justify-center items-center max-w-lg'
            for="create_new_record_artist">
            Artist:</label>

          <select
            onchange="getExistingRecords()"
            class='rounded-lg m-2 w-full max-w-lg'
            id='create_new_record_artist'>
            @isset($artists)
              @foreach($artists as $artist)
                <option value='{{$artist->id}}'>{{$artist->name}}</option>
              @endforeach
            @endisset
          </select>

        </div>
        
        <div
          class='w-11/12 flex flex-row justify-center items-center'>

          <label
            class='my-2 w-24 flex justify-center items-center'
            for="create_new_record_name">
            Name:</label>

          <input
            class='m-2 rounded-lg w-full max-w-lg'
            type="text"
            id="create_new_record_name">

        </div>

        <div
          class='w-11/12 flex flex-row justify-center items-center'>

          <label
            class='my-2 w-24 flex justify-center items-center max-w-lg'
            for="create_new_record_year">
            Year:</label>

          <input
            class='m-2 rounded-lg w-full max-w-lg'
            type="number"
            min=0
            step=1
            id="create_new_record_year">

        </div>

        <div
          class='w-11/12 flex flex-row justify-center items-center'>

          <label
            class='my-2 w-24 flex justify-center items-center max-w-lg'
            for="create_new_record_stars">
            Stars:</label>

          <input
            class='m-2 rounded-lg w-full max-w-lg'
            type="number"
            min=1
            step=1
            max=5
            id="create_new_record_stars">

        </div>

        <div
          class='w-11/12 flex flex-row justify-center items-center'>

          <label
            class='my-2 w-24 flex justify-center items-center max-w-lg'
            for="create_new_record_review">
            Review:</label>

          <textarea
            class='m-2 rounded-lg w-full max-w-lg'
            maxlength=1000
            rows="4" cols="50"
            id="create_new_record_review"></textarea>

        </div>

        <div
          class='w-11/12 flex flex-row justify-center items-center'>

          <label
            class='my-2 w-24 flex justify-center items-center max-w-lg'
            for="create_new_record_artist">
            Tags:</label>

          <select
            multiple
            size=10
            class='rounded-lg m-2 w-full max-w-lg'
            id='create_new_record_tags'>
            @isset($tags)
              @foreach($tags as $tag)
                <option value='{{$tag->id}}'>{{$tag->name}}</option>
              @endforeach
            @endisset
          </select>

        </div>

        <x-secondary-button
          onclick='create_music_record()'
          class='my-4 p-2'>
          Create</x-secondary-button>

      </div>

      @isset($records)

        @foreach($records as $record)

          <h2
            data-value='{{$record->artist_id}}'
            data-id='{{$record->id}}'
            data-name='{{$record->name}}'
            class='records w-full md:w-1/2 lg:w-1/3 max-w-lg flex flex-col justify-start items-center mb-2 border-b border-black'>

            <select
              id='record_artist_{{$record->id}}'
              class='mx-2 rounded-lg border border-black p-2 m-2 w-10/12'>

                @isset($artists)

                  @foreach($artists as $artist)

                    <option
                      @if($artist->id === $record->artist_id)
                        selected
                      @endif
                    
                    value='{{$artist->id}}'>{{$artist->name}}</option>

                  @endforeach

                @endisset

            </select>

            <input
              id='record_name_{{$record->id}}'
              class='mx-2 rounded-lg border border-black p-2 m-2 w-10/12'
              type='text'
              value='{{$record->name}}'>

            <input
              id='record_year_{{$record->id}}'
              class='mx-2 rounded-lg border border-black p-2  m-2 w-10/12'
              type='number'
              min=0
              step=1
              value='{{$record->release_year}}'>

            <input
              id='record_stars_{{$record->id}}'
              class='mx-2 rounded-lg border border-black p-2  m-2 w-10/12'
              type='number'
              min=1
              max=5
              step=1
              value='{{$record->stars}}'>

            <textarea
              id='record_review_{{$record->id}}'
              class='mx-2 rounded-lg border border-black p-2  m-2 w-10/12'
              maxLength=1000
              rows="4" cols="50">{{$record->review}}</textarea>

              <select
              multiple
              size=10
              class='rounded-lg m-2 w-10/12 max-w-lg'
              id='record_tags_{{$record->id}}'>
              @isset($tags)
                @foreach($tags as $tag)
                  <option value='{{$tag->id}}'
                    @foreach($actual_tags as $actual_tag)
                      @if($actual_tag->ref_type === 2 &&
                      $actual_tag->ref_id === $record->id &&
                      $actual_tag->tag_id === $tag->id)
                        selected
                      @endif
                    @endforeach
                    >{{$tag->name}}</option>
                @endforeach
              @endisset
            </select>

            <div
              class='w-10/12 flex flex-row justify-center items-center my-2'>

              <button
                onclick='edit_music_record({{$record->id}})'
                class='rounded-lg border border-black w-1/3 mx-2'>
                Save
              </button>

              <button
                onclick='delete_music_record({{$record->id}})'
                class='rounded-lg border border-black w-1/3 mx-2'>
                Delete
              </button>

            </div>
            
          </h2>

        @endforeach

      @endisset

    </section>

    <!-- CREATE NEW TRACK -->

    <section
      id='tracks_panel'
      class='w-full flex flex-wrap my-2'>

      <div
        class='w-full flex flex-col justify-start items-center border-b border-black mb-2'>

        <div
          class='w-11/12 flex flex-row justify-center items-center'>

          <label
            class='my-2 w-28 flex justify-center items-center'
            for="create_new_track_artist">
            Artist:</label>

          <select
            onchange="updateRecordsSelect()"
            class='rounded-lg m-2 w-full max-w-lg'
            id='create_new_track_artist'>
            @isset($artists)
              @foreach($artists as $artist)
                <option value='{{$artist->id}}'>{{$artist->name}}</option>
              @endforeach
            @endisset
          </select>

        </div>

        <div
          class='w-11/12 flex flex-row justify-center items-center'>

          <label
            class='my-2 w-28 flex justify-center items-center'
            for="create_new_track_record">
            Record:</label>

          <select
            onchange="getExistingTracks()"
            class='rounded-lg m-2 w-full max-w-lg'
            id='create_new_track_record'>
          </select>

        </div>

        <div
          class='w-11/12 flex flex-row justify-center items-center'>

          <label
            class='my-2 w-28 flex justify-center items-center'
            for="create_new_track_position">
            Position:</label>

          <input
            class='m-2 rounded-lg w-full max-w-lg'
            type="number"
            min=1
            step=1
            id="create_new_track_position">

        </div>
        
        <div
          class='w-11/12 flex flex-row justify-center items-center'>

          <label
            class='my-2 w-28 flex justify-center items-center'
            for="create_new_track_name">
            Name:</label>

          <input
            class='m-2 rounded-lg w-full max-w-lg'
            type="text"
            id="create_new_track_name">

        </div>

        <div
          class='w-11/12 flex flex-row justify-center items-center'>

          <label
            class='my-2 w-28 flex justify-center items-center'
            for="create_new_track_stars">
            Stars:</label>

          <input
            class='m-2 rounded-lg w-full max-w-lg'
            type="number"
            min=1
            step=1
            max=5
            id="create_new_track_stars">

        </div>

        <div
          class='w-11/12 flex flex-row justify-center items-center'>

          <label
            class='my-2 w-28 flex justify-center items-center'
            for="create_new_track_review">
            Review:</label>

          <textarea
            class='m-2 rounded-lg w-full max-w-lg'
            maxlength=1000
            id="create_new_track_review"
            rows="4" cols="50"></textarea>

        </div>

        <x-secondary-button
          onclick='create_music_track()'
          class='my-4 p-2'>
          Create</x-secondary-button>

      </div>

      @isset($tracks)

        @foreach($tracks as $track)

          <h2
            data-artist='{{$track->artist_id}}'
            data-record='{{$track->record_id}}'
            class='tracks w-full md:w-1/2 lg:w-1/3 flex flex-col justify-start items-center mb-2 border-b border-black'>

            <select
              id='track_artist_{{$track->id}}'
              class='mx-2 rounded-lg border border-black p-2 m-2 w-10/12 max-w-lg'>

                @isset($artists)

                  @foreach($artists as $artist)

                    <option
                      @if($artist->id === $track->artist_id)
                        selected
                      @endif
                    
                    value='{{$artist->id}}'>{{$artist->name}}</option>

                  @endforeach

                @endisset

            </select>

            <select
              id='track_record_{{$track->id}}'
              class='mx-2 rounded-lg border border-black p-2 m-2 w-10/12 max-w-lg'>

                @isset($records)

                @foreach($records as $record)

                  <option
                    @if($record->id === $track->record_id)
                      selected
                    @endif
                  
                  value='{{$record->id}}'>{{$record->name}}</option>

                @endforeach

                @endisset

            </select>

            <input
              id='track_pos_{{$track->id}}'
              class='mx-2 rounded-lg border border-black p-2  m-2 w-10/12 max-w-lg'
              type='number'
              min=0
              step=1
              value='{{$track->pos}}'>

            <input
              id='track_name_{{$track->id}}'
              class='mx-2 rounded-lg border border-black p-2 m-2 w-10/12 max-w-lg'
              type='text'
              value='{{$track->name}}'>

            <input
              id='track_stars_{{$track->id}}'
              class='mx-2 rounded-lg border border-black p-2  m-2 w-10/12 max-w-lg'
              type='number'
              min=1
              max=5
              step=1
              value='{{$track->stars}}'>

            <textarea
              id='track_review_{{$track->id}}'
              class='mx-2 rounded-lg border border-black p-2 m-2 w-10/12 max-w-lg'
              maxLength=1000
              rows="4" cols="50">{{$track->review}}</textarea>

            <div
              class='w-10/12 flex flex-row justify-center items-center my-2'>

              <button
                onclick='edit_music_track({{$track->id}})'
                class='rounded-lg border border-black w-1/3 mx-2'>
                Save
              </button>

              <button
                onclick='delete_music_track({{$track->id}})'
                class='rounded-lg border border-black w-1/3 mx-2'>
                Delete
              </button>

            </div>
            
          </h2>

        @endforeach

      @endisset

    </section>

    <!-- CREATE NEW TAG -->

    <section
      id='tags_panel'
      class='w-full flex flex-wrap my-2'>

      <div
        class='w-full flex flex-col justify-start items-center border-b border-black mb-2'>

        <div
          class='w-11/12 flex flex-row justify-center items-center'>

          <label
            class='my-2 w-32 flex justify-center items-center'
            for="create_artist_name">
            Name:</label>

            <input
            onkeyup="searchTags()"
            class='my-2 rounded-lg w-11/12 max-w-lg'
            type="text"
            id="create_music_tag">

        </div>

        <x-secondary-button
          onclick='create_music_tag()'
          class='my-4 p-2'>
          Create</x-secondary-button>

      </div>

      @isset($tags)

        @foreach($tags as $tag)

          <h2
            data-value='{{$tag->name}}'
            class='tags w-full md:w-1/2 lg:w-1/3 flex flex-row justify-center items-center my-2'>

            <button
              onclick='edit_music_tag({{$tag->id}})'
              class='mx-2 rounded-lg border border-black p-2'>
              S
            </button>

            <input
              id='tag{{$tag->id}}'
              class='mx-2 rounded-lg border border-black p-2 w-full max-w-lg'
              type='text'
              value='{{$tag->name}}'>

            <button
              onclick='delete_music_tag({{$tag->id}})'
              class='mx-2 rounded-lg border border-black p-2'>
              X
            </button>
            
          </h2>

        @endforeach

      @endisset

    </section>

  </div>

  <script>

    let artists = document.getElementById('artists_panel');
    let records = document.getElementById('records_panel');
    let tracks = document.getElementById('tracks_panel');
    let tags = document.getElementById('tags_panel');

    const panels = [artists, records, tracks, tags];

    function Switch(panel)
    {
      let value = 0;
      if(panel === 'artists_panel') value = 0;
      else if(panel === 'records_panel') value = 1;
      else if(panel === 'tracks_panel') value = 2;
      else if(panel === 'tags_panel') value = 3;

      for(let i = 0; i < panels.length; i++)
      {
        if(i === value)
        {
          document.getElementById('button_' + panels[i].id).style.fontWeight = 'bold';
          panels[i].style.display = '';
        }
        else
        {
          document.getElementById('button_' + panels[i].id).style.fontWeight = 'normal';
          panels[i].style.display = 'none';
        }
      }
    }

    function searchMatches()
    {
      let input = document.getElementById('create_artist_name').value;
      let existing = document.getElementsByClassName('artists');

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

    function getExistingRecords()
    {
      let input = parseInt(document.getElementById('create_new_record_artist').value);
      let existing = document.getElementsByClassName('records');

      for(let i = 0; i < existing.length; i++)
      {
        let item = existing[i];
        if(parseInt(item.dataset.value) === input)
        {
          item.style.display = '';
        }
        else
        {
          item.style.display = 'none';
        }
      }
    }

    function updateRecordsSelect()
    {
      let input = parseInt(document.getElementById('create_new_track_artist').value);
      let tracks = document.getElementsByClassName('tracks');
      let records = document.getElementsByClassName('records');
      let select = document.getElementById('create_new_track_record');
      select.options.length = 0;

      for(let r = 0; r < records.length; r++)
      {
        if(parseInt(records[r].dataset.value) === input)
        {
          let opt = document.createElement('option');
          opt.value = records[r].dataset.id;
          opt.innerHTML = records[r].dataset.name;
          select.appendChild(opt);
        }
      }

      getExistingTracks();
    }

    function getExistingTracks()
    {
      let artist_id = parseInt(document.getElementById('create_new_track_artist').value);
      let record_id = parseInt(document.getElementById('create_new_track_record').value);
      let tracks = document.getElementsByClassName('tracks');

      for(let i = 0; i < tracks.length; i++)
      {
        let item = tracks[i];
        if(parseInt(item.dataset.artist) === artist_id &&
           parseInt(item.dataset.record) === record_id)
        {
          item.style.display = '';
        }
        else
        {
          item.style.display = 'none';
        }
      }
    }

    function searchTags()
    {
      let input = document.getElementById('create_music_tag').value;
      let tags = document.getElementsByClassName('tags');

      for(let i = 0; i < tags.length; i++)
      {
        let item = tags[i];
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

    function create_music_artist()
    {
      let name = document.getElementById('create_artist_name').value;

      let influence_select = document.getElementById('create_artist_influences');
      let influence_selected = influence_select.selectedOptions;
      let influences = [];
      for(let i = 0; i < influence_selected.length; i++)
      {
        influences.push(influence_selected[i].value);
      }

      let similar_select = document.getElementById('create_artist_similar');
      let similar_selected = similar_select.selectedOptions;
      let similar = [];
      for(let i = 0; i < similar_selected.length; i++)
      {
        similar.push(similar_selected[i].value);
      }

      if(name === '') return window.alert('no data submitted');

      let data = JSON.stringify({
        name:name,
        influences:influences,
        similar:similar,
      });

      console.log(data);

      Post(data, 'create_music_artist',
      function(response)
      {
        window.alert('Create successful');
        console.log("Success: " + response.message);
      },
      function(error)
      {
        window.alert('Error');
        console.error("Error: " + error.message);
      });
    }

    function edit_music_artist(id)
    {
      let name = document.getElementById('artist' + id).value;

      let influence_select = document.getElementById('artist_influences_' + id);
      let influence_selected = influence_select.selectedOptions;
      let influences = [];
      for(let i = 0; i < influence_selected.length; i++)
      {
        influences.push(influence_selected[i].value);
      }

      let similar_select = document.getElementById('artist_similar_' + id);
      let similar_selected = similar_select.selectedOptions;
      let similar = [];
      for(let i = 0; i < similar_selected.length; i++)
      {
        similar.push(similar_selected[i].value);
      }

      if(name === '') return window.alert('no data submitted');

      let data = JSON.stringify({
        id:id,
        name:name,
        influences:influences,
        similar:similar,
      });

      console.log(data);

      Post(data, 'edit_music_artist',
      function(response)
      {
        window.alert('Edit successful');
        console.log("Success: " + response.message);
      },
      function(error)
      {
        console.error("Error: " + error.message);
      });
    }

    function delete_music_artist(id)
    {
      if(!window.confirm('Are you sure you want to delete this artist?'))
      {
        return;
      }
      let data = JSON.stringify({ id:id });
      console.log(data);
      Post(data, 'delete_music_artist',
      function(response)
      {
        window.alert('Delete successful');
        console.log("Success: " + response.message);
      },
      function(error)
      {
        console.error("Error: " + error.message);
      });
    }

    function create_music_record()
    {
      let artist = document.getElementById('create_new_record_artist').value;
      let name = document.getElementById('create_new_record_name').value;
      let year = document.getElementById('create_new_record_year').value;
      let stars = document.getElementById('create_new_record_stars').value;
      let review = document.getElementById('create_new_record_review').value;

      let tag_select = document.getElementById('create_new_record_tags');
      let tag_selected = tag_select.selectedOptions;
      let tags = [];
      for(let i = 0; i < tag_selected.length; i++)
      {
        tags.push(tag_selected[i].value);
      }


      let data = JSON.stringify({
        artist:artist,
        name:name,
        year:year,
        stars:stars,
        review:review,
        tags:tags,
      });

      console.log(data);

      Post(data, 'create_music_record',
      function(response)
      {
        window.alert('Create successful');
        console.log(response);
      },
      function(error)
      {
        console.error("Error: " + error.message);
      });
    }

    function edit_music_record(id)
    {
      let artist = document.getElementById('record_artist_' + id).value;
      let name = document.getElementById('record_name_' + id).value;
      let year = document.getElementById('record_year_' + id).value;
      let stars = document.getElementById('record_stars_' + id).value;
      let review = document.getElementById('record_review_' + id).value;

      let tag_select = document.getElementById('record_tags_' + id);
      let tag_selected = tag_select.selectedOptions;
      let tags = [];
      for(let i = 0; i < tag_selected.length; i++)
      {
        tags.push(tag_selected[i].value);
      }

      if(name === '') return window.alert('no data submitted');

      let data = JSON.stringify({
        id:id,
        artist:artist,
        name:name,
        year:year,
        stars:stars,
        review:review,
        tags:tags,
      });

      console.log(data);

      Post(data, 'edit_music_record',
      function(response)
      {
        window.alert('Edit successful');
        console.log("Success: " + response.message);
      },
      function(error)
      {
        console.error("Error: " + error.message);
      });
    }

    function delete_music_record(id)
    {
      if(!window.confirm('Are you sure you want to delete this record?'))
      {
        return;
      }
      let data = JSON.stringify({ id:id });
      console.log(data);
      Post(data, 'delete_music_record',
      function(response)
      {
        window.alert('Delete successful');
        console.log("Success: " + response.message);
      },
      function(error)
      {
        console.error("Error: " + error.message);
      });
    }

    function create_music_track()
    {
      let artist = document.getElementById('create_new_track_artist').value;
      let record = document.getElementById('create_new_track_record').value;
      let pos = document.getElementById('create_new_track_position').value;
      let name = document.getElementById('create_new_track_name').value;
      let stars = document.getElementById('create_new_track_stars').value;
      let review = document.getElementById('create_new_track_review').value;

      let data = JSON.stringify({
        artist:artist,
        record:record,
        pos:pos,
        name:name,
        stars:stars,
        review:review,
      });

      console.log(data);

      Post(data, 'create_music_track',
      function(response)
      {
        window.alert('Create successful');
        console.log(response);
      },
      function(error)
      {
        console.error("Error: " + error.message);
      });
    }

    function edit_music_track(id)
    {
      let artist = document.getElementById('track_artist_' + id).value;
      let record = document.getElementById('track_record_' + id).value;
      let pos = document.getElementById('track_pos_' + id).value;
      let name = document.getElementById('track_name_' + id).value;
      let stars = document.getElementById('track_stars_' + id).value;
      let review = document.getElementById('track_review_' + id).value;

      let data = JSON.stringify({
        id:id,
        artist:artist,
        record:record,
        pos:pos,
        name:name,
        stars:stars,
        review:review,
      });

      if(name === '') return window.alert('no data submitted');

      console.log(data);

      Post(data, 'edit_music_track',
      function(response)
      {
        window.alert('Edit successful');
        console.log("Success: " + response.message);
      },
      function(error)
      {
        console.error("Error: " + error.message);
      });
    }

    function delete_music_track(id)
    {
      if(!window.confirm('Are you sure you want to delete this track?'))
      {
        return;
      }
      let data = JSON.stringify({ id:id });
      console.log(data);
      Post(data, 'delete_music_track',
      function(response)
      {
        window.alert('Delete successful');
        console.log("Success: " + response.message);
      },
      function(error)
      {
        console.error("Error: " + error.message);
      });
    }

    function create_music_tag()
    {
      let name = document.getElementById('create_music_tag').value;
      if(name === '') return window.alert('no data submitted');
      let data = JSON.stringify({ name:name });
      console.log(data);
      Post(data, 'create_music_tag',
      function(response)
      {
        window.alert('Create successful');
        console.log("Success: " + response.message);
      },
      function(error)
      {
        console.error("Error: " + error.message);
      });
    }

    function edit_music_tag(id)
    {
      let name = document.getElementById('tag' + id).value;
      if(name === '') return window.alert('no data submitted');
      let data = JSON.stringify({ id:id, name:name });
      console.log(data);
      Post(data, 'edit_music_tag',
      function(response)
      {
        window.alert('Edit successful');
        console.log("Success: " + response.message);
      },
      function(error)
      {
        console.error("Error: " + error.message);
      });
    }

    function delete_music_tag(id)
    {
      if(!window.confirm('Are you sure you want to delete this tag?'))
      {
        return;
      }
      let data = JSON.stringify({ id:id });
      console.log(data);
      Post(data, 'delete_music_tag',
      function(response)
      {
        window.alert('Delete successful');
        console.log("Success: " + response.message);
      },
      function(error)
      {
        console.error("Error: " + error.message);
      });
    }

    function Post(data, route, callback)
    {
      $.ajax(
      {
        method: "POST",
        url: '/author_music/' + route,
        headers:
        {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data:
        {
          data:data
        },
        success:function(response)
        {
          callback(response);
        },
        error:function(xhr, status, error)
        {
          console.error(xhr);
          console.error(status);
          console.error(error);
        }
      });
    }

    document.addEventListener('DOMContentLoaded', Switch('artists_panel'));

  </script>

</x-app-layout>