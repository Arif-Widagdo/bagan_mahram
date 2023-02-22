  <div class="col-6">
    @if($data->gender == 2 && $data->level > 1)
      <table class="table">
        <tr>
          <th colspan="2">Urutan Wali Nikah</th>
          <th>Hubungan</th>
        </tr>
        {{-- ayah --}}
        <tr>
          <td style="width: 50px"><img src="{{ asset('images/'.$data->parent->image) }}" style="width: 50px"></td>
          <td>@if($data->parent->gender == 2) Suami dari {{ $data->parent->name }} (Ibu) @else {{ $data->parent->name }} @endif</td>
          <td><a style="color: red">Ayah</a></td>
        </tr>
        {{-- kakek --}}
        @if($data->level > 2)
          <tr>
            <td style="width: 50px"><img src="{{ asset('images/'.$data->parent->image) }}" style="width: 50px"></td>
            <td>@if($data->parent->gender == 2) Ayah Suami dari {{ $data->parent->name }} (Ibu) @else {{ $data->parent->parent->name }} @endif </td>
            <td><a style="color: red">Kakek</a></td>
          </tr>
        @endif
        {{-- saudara laki-laki --}}
        <?php $brothers = App\Models\Humans::where('humans_id', $data->humans_id)->where('gender', 1)->get(); ?>
        @foreach ($brothers as $brother)
          <tr>
            <td style="width: 50px"><img src="{{ asset('images/'.$brother->image) }}" style="width: 50px"></td>
            <td>{{ $brother->name }}</td>
            <td><a style="color: red">Saudara</a></td>
          </tr>
        @endforeach
        {{-- keponakan dari saudara laki-laki --}}
        @foreach ($brothers as $brother)
          <?php $ponakans = App\Models\Humans::where('humans_id', $brother->id)->where('gender', 1)->get() ?>
          @foreach ($ponakans as $ponakan)
            <tr>
              <td style="width: 50px"><img src="{{ asset('images/'.$ponakan->image) }}" style="width: 50px"></td>
              <td>{{ $ponakan->name }}</td>
              <td><a style="color: red">Anak dari {{ $ponakan->parent->name }} (Keponakan)</a></td>
            </tr>
          @endforeach
        @endforeach
        @if($data->level > 2)
          @if($data->parent->gender == 2)
            {{-- paman dan sepupu jika parentnya ibu --}}
            <tr>
              <td style="width: 50px"><img src="{{ asset('images/'.$data->parent->image) }}" style="width: 50px"></td>
              <td>Saudara Laki-Laki dari Suami {{ $data->parent->name }}</td>
              <td>Paman</td>
            </tr>
            <tr>
              <td style="width: 50px"><img src="{{ asset('images/'.$data->parent->image) }}" style="width: 50px"></td>
              <td>Anak Laki-Laki dari Saudara Laki-Laki Suami {{ $data->parent->name }}</td>
              <td>Sepupu</td>
            </tr>
          @else
            {{-- paman --}}
            <?php $walis = App\Models\Humans::where('humans_id', $data->parent->humans_id)->where('id', '!=', $data->humans_id)->where('gender', 1)->get(); ?>
            @foreach($walis as $wali)
              <tr>
                <td style="width: 50px"><img src="{{ asset('images/'.$wali->image) }}" style="width: 50px"></td>
                <td>{{ $wali->name }}</td>
                <td>Paman</td>
              </tr>
            @endforeach
            {{-- sepupu --}}
            @foreach ($walis as $wali)
              <?php $sepupus = App\Models\Humans::where('humans_id', $wali->id)->where('gender', '=', 1)->get() ?>
              @foreach ($sepupus as $sepupu)
                <tr>
                  <td style="width: 50px"><img src="{{ asset('images/'.$sepupu->image) }}" style="width: 50px"></td>
                  <td>{{ $sepupu->name }}</td>
                  <td>Sepupu</td>
                </tr>
              @endforeach
            @endforeach
          @endif
        @endif
      </table>
    @endif
  </div>