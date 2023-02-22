          <?php $mahramBawah = App\Models\Humans::where('humans_id', $mahram->id)->get() ?>
          @foreach ($mahramBawah as $mahram)
            @if ($data->gender != $mahram->gender)
              <tr>
                <td style="width: 50px"><img src="{{ asset('images/'.$mahram->image) }}" style="width: 50px"></td>
                <td><a> {{ $mahram->name }}</a></td>
              </tr>
            @endif
            @include('mahramBawah')
          @endforeach