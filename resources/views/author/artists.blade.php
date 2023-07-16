<x-app-layout>

  <div
    class='w-full flex flex-col justify-start items-center'>

    @livewire('music-search-artists')

  </div>

  <script>

    let edit = document.getElementById('edit');
    edit.style.display = 'none';

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

  </script>

</x-app-layout>