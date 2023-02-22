          <?php $mahramAtas = App\Models\Humans::where('id', $mahram->humans_id)->get() ?>
          @foreach ($mahramAtas as $mahram)
            @if ($data->gender != $mahram->gender)
              <tr>
                <td style="width: 50px"><img src="{{ asset('images/'.$mahram->image) }}" style="width: 50px"></td>
                <td><a> {{ $mahram->name }}</a></td>
              </tr>
            @endif
            @include('mahramAtas')
          @endforeach