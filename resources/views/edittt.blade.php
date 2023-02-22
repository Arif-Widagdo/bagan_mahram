<?php $innerPage = true; ?>
@section('pageName', 'Anggota Keluarga')
@include('header')
<form action="{{ route('dashboard.destroy', $data->id) }}" method="POST">
  @csrf
  @method('delete')
  <button class="btn btn-danger pull-right" style="color: white">Hapus</button>
</form>
<form action="{{ route('dashboard.update', $data->id) }}" method="post" enctype="multipart/form-data">
  @csrf
  @method('patch')
  <div class="form-group row">
    <div class="col-7">
      <div class="form-group">
        <label>Nama</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $data->name) }}" >
        @error('name')
          <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="form-group row">
        <div class="col-6">
          <label>Jenis Kelamin</label>
          <?php
            if($data->gender == 1){
              $name    = 'Laki-Laki';
              $value   = '1';
              $noName  = 'Perempuan';
              $noValue = '2';
            }else{
              $name    = 'Perempuan';
              $value   = '2';
              $noName  = 'Laki-Laki';
              $noValue = '1';
            }
          ?>
          <select class="form-control" name="gender" required>
            <option value="{{ $value }}">{{ $name }}</option>
            <option value="{{ $noValue }}">{{ $noName }}</option>
          </select>
        </div>
        <div class="col-6">
          <label>Tanggal Lahir</label>
          <input type="date" name="date" class="form-control" value="{{ $data->birthday }}" required>
        </div>
      </div>
      <div class="form-group">
        <label>No. HP</label>
        <input type="text" name="phone" class="form-control" value="{{ $data->phone }}">
      </div>
      <div class="form-group">
        <label>Alamat</label>
        <input type="textbox" name="address" class="form-control" value="{{ $data->address }}">
      </div>

      @if ($data->humans_id != null)
        <div class="form-group">
          <label>Orangtua</label>
          <select name="parent" class="form-control" required>
            <option value="{{ $data->humans_id }}">{{ $data->parent->name }}</option>
            @foreach ($parents as $parent)
              @if($parent->id != $data->id && $parent->id != $data->humans_id)
                <option value="{{ $parent->id }}">{{ $parent->name }}</option>
              @endif
            @endforeach
          </select>
        </div>
      @endif
      
      <div class="form-group">
        <button class="btn btn-primary">Simpan</button>
        <a href="/dashboard" class="btn btn-light border">Batal</a>
      </div>
    </div>
    <div class="col-4">
      <img src="{{ asset('images/'.$data->image) }}" class="img-thumbnail" style="width: 100%">
      <input type="file" name="image" class="form-control">
    </div>
  </div>
</form>
<div class="row">
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
          <?php $mahramOne = App\Models\Humans::where('humans_id', $mahram->id)->get() ?>
          @foreach ($mahramOne as $mahram)
            @if ($mahram->gender != $data->gender)
              <tr>
                <td style="width: 50px"><img src="{{ asset('images/'.$mahram->image) }}" style="width: 50px"></td>
                <td><a> {{ $mahram->name }}</a></td>
              </tr>
            @endif
            <?php $mahramOne = App\Models\Humans::where('humans_id', $mahram->id)->get() ?>
            @foreach ($mahramOne as $mahram)
              @if ($mahram->gender != $data->gender)
                <tr>
                  <td style="width: 50px"><img src="{{ asset('images/'.$mahram->image) }}" style="width: 50px"></td>
                  <td><a> {{ $mahram->name }}</a></td>
                </tr>
              @endif
              <?php $mahramOne = App\Models\Humans::where('humans_id', $mahram->id)->get() ?>
              @foreach ($mahramOne as $mahram)
                @if ($mahram->gender != $data->gender)
                  <tr>
                    <td style="width: 50px"><img src="{{ asset('images/'.$mahram->image) }}" style="width: 50px"></td>
                    <td><a> {{ $mahram->name }}</a></td>
                  </tr>
                @endif
                <?php $mahramOne = App\Models\Humans::where('humans_id', $mahram->id)->get() ?>
                @foreach ($mahramOne as $mahram)
                  @if ($mahram->gender != $data->gender)
                    <tr>
                      <td style="width: 50px"><img src="{{ asset('images/'.$mahram->image) }}" style="width: 50px"></td>
                      <td><a> {{ $mahram->name }}</a></td>
                    </tr>
                  @endif
                  <?php $mahramOne = App\Models\Humans::where('humans_id', $mahram->id)->get() ?>
                  @foreach ($mahramOne as $mahram)
                    @if ($mahram->gender != $data->gender)
                      <tr>
                        <td style="width: 50px"><img src="{{ asset('images/'.$mahram->image) }}" style="width: 50px"></td>
                        <td><a> {{ $mahram->name }}</a></td>
                      </tr>
                    @endif
                  @endforeach
                @endforeach
              @endforeach
            @endforeach
          @endforeach
        @endforeach
      @endif

      @if ($data->level > 1)
        @if ($data->parent->gender != $data->gender)
          <tr>
            <td style="width: 50px"><img src="{{ asset('images/'.$data->parent->image) }}" style="width: 50px"></td>
            <td><a> {{ $data->parent->name }}</a></td>
          </tr>
        @endif
      @endif
      
      @foreach($mahramOrtu as $mo)
        <tr>
          <td style="width: 50px"><img src="{{ asset('images/'.$mo->image) }}" style="width: 50px"></td>
          <td><a> {{ $mo->name }}</a></td>
        </tr>
      @endforeach
      @foreach($mahramGran as $m)
        @if($m->gender != $data->gender)
          <tr>
            <td style="width: 50px"><img src="{{ asset('images/'.$m->image) }}" style="width: 50px"></td>
            <td>{{ $m->name }}</td>
          </tr>
        @endif
        @include('mahramLooper')
      @endforeach
    </table>
  </div>
  <div class="col-6">
    @if($data->gender == 2 && $data->level > 1)
      <table class="table">
        <tr>
          <th colspan="2">Urutan Wali Nikah</th>
          <th>Hubungan</th>
        </tr>
        <tr>
          <td style="width: 50px"><img src="{{ asset('images/'.$data->parent->image) }}" style="width: 50px"></td>
          <td>@if($data->parent->gender == 2) Suami dari {{ $data->parent->name }} (Ibu) @else {{ $data->parent->name }} @endif</td>
          <td><a style="color: red">Ayah</a></td>
        </tr>
        @if($data->level > 2)
          <tr>
            <td style="width: 50px"><img src="{{ asset('images/'.$data->parent->image) }}" style="width: 50px"></td>
            <td>@if($data->parent->gender == 2) Ayah Suami dari {{ $data->parent->name }} (Ibu) @else {{ $data->parent->parent->name }} @endif </td>
            <td><a style="color: red">Kakek</a></td>
          </tr>
        @endif
        <?php $brothers = App\Models\Humans::where('humans_id', $data->humans_id)->where('gender', 1)->get(); ?>
        @foreach ($brothers as $brother)
          <tr>
            <td style="width: 50px"><img src="{{ asset('images/'.$brother->image) }}" style="width: 50px"></td>
            <td>{{ $brother->name }}</td>
            <td><a style="color: red">Saudara</a></td>
          </tr>
        @endforeach
            
        <?php
        if($data->level > 2){
          if($data->parent->gender == 2){
        ?>
            <tr>
              <td style="width: 50px"><img src="{{ asset('images/'.$data->parent->image) }}" style="width: 50px"></td>
              <td>Saudara Laki-Laki dari Suami {{ $data->parent->name }}</td>
              <td>Paman</td>
            </tr>
        <?php
          }else{
            $walis = App\Models\Humans::where('humans_id', $data->parent->humans_id)->where('id', '!=', $data->humans_id)->where('gender', 1)->get();
            foreach($walis as $wali){
        ?>
              <tr>
                <td style="width: 50px"><img src="{{ asset('images/'.$wali->image) }}" style="width: 50px"></td>
                <td>{{ $wali->name }}</td>
                <td>Paman</td>
              </tr>
        <?php
            }
          }
        }
        ?>
      </table>
    @endif
  </div>
</div>
@include('footer')