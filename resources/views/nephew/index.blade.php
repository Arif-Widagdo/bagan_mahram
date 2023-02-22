<?php $innerPage = false; ?>
@include('header')

<a class="btn btn-primary" href="{{ route('dashboard.index') }}" style="margin: 0px 0px 20px 20px">Bagan Keluarga</a>
  @if($uncles != null)
    <a class="btn btn-warning" href="{{ route('keponakan.create') }}" style="margin: 0px 0px 20px 20px">Tambah Keponakan</a>
    <h4>Keponakan Tanpa Hubungan Keluarga Lengkap</h4>
    <div class="body">
      @foreach ($uncles as $uncle)
      <div class="row">
        <div class="tree">
          <ul class="ul">
            <li class="li"> <a class="a" href="{{ route('dashboard.edit', $uncle->id) }}"><img class="img" src="{{ asset('images/'.$uncle->image) }}"><span class="span">{{ $uncle->name }}</span></a>
              <ul class="ul">
                <?php $nephews = App\Models\Nephews::where('humans_id', $uncle->id)->get() ?>
                @foreach ($nephews as $nephew)
                  <li class="li"><a class="a" href="{{ route('keponakan.edit', $nephew->id) }}"><img class="img" src="{{ asset('images/'.$nephew->image) }}"><span class="span">{{ $nephew->name }}</span></a>
                  </li>
                @endforeach
              </ul>
            </li>
          </ul>
        </div>
      </div>
      @endforeach
    </div>
  @endif

@include('footer')