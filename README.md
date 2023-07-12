# arts-blog

music
music/{{artist}}
music/{{artist}}/{{record}}
music/{{artist}}/{{record}}/{{track}}
music/tags
music/tags/{{tag}}

artists table
id / name / created / updated

records table
id / artist_id / name / release_year / stars / review / created / updated

tracks table
id / artist_id / record_id / name / stars / review / created / updated

tags(genres) table
id / id_type (artist, record, track) / reference_id / tag / created / updated

influence table
id / artist_id / influence_id / stars / created / updated

similar
id / artist_id / similar_id / stars / created / updated