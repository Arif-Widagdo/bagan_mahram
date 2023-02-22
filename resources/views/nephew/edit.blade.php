<?php $innerPage = true; ?>
@section('pageName', 'Keponakan')
@include('header')
<form action="{{ route('keponakan.destroy', $data->id) }}" method="POST">
  @csrf
  @method('delete')
  <button class="btn btn-danger pull-right" style="color: white">Hapus</button>
</form>
<form action="{{ route('keponakan.update', $data->id) }}" method="post" enctype="multipart/form-data">
  @csrf
  @method('patch')
  <div class="form-group row">
    <div class="col-7">
      <div class="form-group">
        <label>Nama</label>
        <input type="text" name="name" class="form-control" value="{{ $data->name }}" required>
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
        <label>Orangtua</label>
        <select name="parent" class="form-control" required>
          <option value="{{ $data->humans_id }}">{{ $data->uncle->name }}</option>
          @foreach ($parents as $parent)
            @if($parent->id != $data->humans_id)
              <option value="{{ $parent->id }}">{{ $parent->name }}</option>
            @endif
          @endforeach
        </select>
      </div>
      
      <div class="form-group">
        <button class="btn btn-primary">Simpan</button>
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
      <tr><th>Marham</th></tr>
        <tr>
          <td style="width: 50px"><img src="{{ asset('images/'.$data->uncle->image) }}" style="width: 50px"></td>
          <td><a> {{ $data->uncle->name }}</a></td>
        </tr>
      @foreach($mahram as $m)
        @if($m->gender != $data->gender)
          <tr>
            <td style="width: 50px"><img src="{{ asset('images/'.$m->image) }}" style="width: 50px"></td>
            <td>{{ $m->name }}</td>
          </tr>
        @endif
      @endforeach
    </table>
  </div>
</div>
@include('footer')