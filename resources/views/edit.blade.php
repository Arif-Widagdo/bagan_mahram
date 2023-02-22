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
      <img src="{{ asset('images/'.$data->image) }}" alt="" class="img-fluid rounded-lg img-preview img-fluid border " style="height: auto; width: 100%; object-fit: cover;">

      <div class="form-group mt-1">
        <div class="custom-file">
            <input type="file" class="custom-file-input" accept="image/png, image/gif, image/jpeg" id="image" name="image" onchange="previewImage()">
            <label class="custom-file-label" for="image">{{ __('Choose File') }}</label>
        </div>
      </div>
    </div>


  </div>
</form>
<div class="row">
  @include('mahram')
  @include('wali')
</div>
@include('footer')