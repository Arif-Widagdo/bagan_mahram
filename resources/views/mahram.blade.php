  <div class="col-6">
    <table class="table">
      <tr><th>Mahram</th></tr>
      @if ($data->level == 1)
        @foreach ($mahramOne as $mahram)
          @if ($mahram->gender != $data->gender)
            <tr>
              <td style="width: 50px"><img src="{{ asset('images/'.$mahram->image) }}" style="width: 50px"></td>
              <td><a> {{ $mahram->name }}</a></td>
            </tr>
          @endif
          @include('editLoopMahram')
        @endforeach
      @else
        {{-- atas --}}
        <?php $mahramAtas = App\Models\Humans::where('id', $data->parent->humans_id)->get() ?>
        @foreach ($mahramAtas as $mahram)
          @if ($data->gender != $mahram->gender)
            <tr>
              <td style="width: 50px"><img src="{{ asset('images/'.$mahram->image) }}" style="width: 50px"></td>
              <td><a> {{ $mahram->name }}</a></td>
            </tr>
          @endif
          @include('mahramAtas')
        @endforeach
        {{-- bawah --}}
        <?php $mahramBawah = App\Models\Humans::where('humans_id', $data->parent->humans_id)->get() ?>
        @foreach ($mahramBawah as $mahram)
          @if ($data->gender != $mahram->gender)
            <tr>
              <td style="width: 50px"><img src="{{ asset('images/'.$mahram->image) }}" style="width: 50px"></td>
              <td><a> {{ $mahram->name }}</a></td>
            </tr>
          @endif
          @include('mahramBawah')
        @endforeach
      @endif
    </table>
  </div>