<?php $mahramOne = App\Models\Humans::where('humans_id', $mahram->id)->get() ?>
@foreach ($mahramOne as $mahram)
    @if ($mahram->gender != $data->gender)
        <tr>
            <td style="width: 50px"><img src="{{ asset('images/'.$mahram->image) }}" style="width: 50px"></td>
            <td><a> {{ $mahram->name }}</a></td>
        </tr>
    @endif
    @include('editLoopMahram')
@endforeach