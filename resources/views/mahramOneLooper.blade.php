<?php $mahrams = App\Models\Humans::where('humans_id', $mahram->id)->get(); ?>
@foreach ($mahrams as $mr)
  @if ($mr->gender != $data->gender)
    <tr>
      <td style="width: 50px"><img src="{{ asset('images/'.$mr->image) }}" style="width: 50px"></td>
      <td><a> {{ $mr->name }}</a></td>
    </tr>
  @endif
  @include('mahramOneLooper')
@endforeach