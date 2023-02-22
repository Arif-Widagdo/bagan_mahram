<?php $innerPage = true; ?>
@section('pageName', 'Tambah Anggota Keluarga')
@include('header')
<form action="{{ route('dashboard.store') }}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="form-group row">
    <div class="col-7">
      <div class="form-group">
        <label>Nama</label>
        <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" >
        @error('name')
          <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="form-group row">
        <div class="col-6">
          <label>Jenis Kelamin</label>
          <select class="form-control @error('gender') is-invalid @enderror" name="gender" >
            <option selected="selected" disabled>Pilih Jenis Kelamin</option>
            <option value="2">Perempuan</option>
            <option value="1">Laki-Laki</option>
          </select>
          @error('gender')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="col-6">
          <label>Tanggal Lahir</label>
          <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" >
          @error('date')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group">
        <label>No. HP</label>
        <input type="text" name="phone" class="form-control">
      </div>
      <div class="form-group">
        <label>Alamat</label>
        <input type="textbox" name="address" class="form-control">
      </div>

      @if (!$parents->isEmpty())
        <div class="form-group">
          <label>Orangtua</label>
          <select name="parent" class="form-control" required>
            @foreach ($parents as $parent)
              <option value="{{ $parent->id }}">{{ $parent->name }}</option>
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
      <img src="{{ asset('images/no-image.png') }}" alt="" class="img-fluid rounded-lg img-preview img-fluid border " style="height: auto; width: 100%; object-fit: cover;">

      <div class="form-group mt-1">
        <div class="custom-file">
            <input type="file" class="custom-file-input" accept="image/png, image/gif, image/jpeg" id="image" name="image" onchange="previewImage()">
            <label class="custom-file-label" for="image">{{ __('Choose File') }}</label>
        </div>
      </div>
    </div>
    
  </div>
</form>
@include('footer')