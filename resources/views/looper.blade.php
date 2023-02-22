@php
  $relations = App\Models\Humans::where('humans_id', $relation->id)->get();
@endphp

@if (!empty($relations))
  <ul class="ul">
    @foreach ($relations as $relation)
      <li class="li"><a class="a" href="{{ route('dashboard.edit', $relation->id) }}"><img class="img" src="{{ asset('images/'.$relation->image) }}"><span class="span">{{ $relation->name }}</span></a>
      @include('looper')
      </li>
    @endforeach
  </ul>
@endif