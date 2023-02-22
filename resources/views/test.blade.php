<a class="btn btn-primary" href="{{ route('dashboard.create') }}" style="margin: 0px 0px 20px 0px">Tambah Anggota Keluarga <i class="fas fa-user-plus"></i></a>
  @if($relations != null)
    {{-- <a class="btn btn-warning" href="{{ route('keponakan.index') }}" style="margin: 0px 0px 20px 20px">Tambah Keponakan</a> --}}
    <h4>Bagan Keluarga</h4>
    <div class="body">
      <div class="row">
        <div class="tree">
          <ul class="ul">
            <li class="li"> <a class="a" href="{{ route('dashboard.edit', $one->id) }}"><img class="img" src="{{ asset('images/'.$one->image) }}"><span class="span">{{ $one->name }}</span></a>
              <ul class="ul">
                @foreach ($relations as $relation)
                  <li class="li"><a class="a" href="{{ route('dashboard.edit', $relation->id) }}"><img class="img" src="{{ asset('images/'.$relation->image) }}"><span class="span">{{ $relation->name }}</span></a>
                    @include('looper')
                  </li>
                @endforeach
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  @endif