@php
    $mahram = App\Models\Humans::where('gender', '!=', $data->gender)->where('humans_id', $m->id)->get();
@endphp

@foreach($mahram as $m)
    @php
        $parent = App\Models\Humans::findorfail($m->humans_id);
    @endphp
    <tr>
        <td style="width: 50px"><img src="{{ asset('images/'.$m->image) }}" style="width: 50px"></td>
        <td><a>{{ $m->name }} anak dari {{ $parent->name }}</a></td>
    </tr>
    @include('mahramLooper')
@endforeach