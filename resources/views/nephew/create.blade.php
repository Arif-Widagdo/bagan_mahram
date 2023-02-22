<?php $innerPage = true; ?>
@section('pageName', 'Tambah Keponakan')
@include('header')
<form action="{{ route('keponakan.store') }}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="form-group row">
    <div class="col-7">
      <div class="form-group">
        <label>Nama</label>
        <input type="text" name="name" class="form-control" required>
      </div>
      <div class="form-group row">
        <div class="col-6">
          <label>Jenis Kelamin</label>
          <select class="form-control" name="gender" required>
            <option value="1">Laki-Laki</option>
            <option value="2">Perempuan</option>
          </select>
        </div>
        <div class="col-6">
          <label>Tanggal Lahir</label>
          <input type="date" name="date" class="form-control" required>
        </div>
      </div>
        <div class="form-group">
          <label>Paman/Bibi</label>
          <select name="parent" class="form-control" required>
            @foreach ($uncles as $uncle)
              <option value="{{ $uncle->id }}">{{ $uncle->name }}</option>
            @endforeach
          </select>
        </div>

      <div class="form-group">
        <button class="btn btn-primary">Simpan</button>
      </div>
    </div>
    <div class="col-4">
      <img src="gambar.jpg" class="img-thumbnail">
      <input type="file" name="image" class="form-control">
    </div>
  </div>
</form>
@include('footer')