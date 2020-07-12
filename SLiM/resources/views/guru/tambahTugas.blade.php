@extends('guru/kelasDetail')
@section('isi')
<form action="{{url('guru/tugas-tambah')}}" method="post" enctype="multipart/form-data">
  @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Nama Tugas</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Deskripsi</label>
      <input type="text" class="form-control" id="exampleInputPassword1" name="deskripsi">
    </div>
    <div class="form-group">
      <label for="exampleFormControlFile1">Pilih file pdf, word, image</label>
      <input type="file" class="form-control-file" id="exampleFormControlFile1" name="fileUp">
      <input type="hidden" name="id_kelas" value="{{$data[0]->id_kelas}}">
      <input type="hidden" name="id_mapel" value="{{$data[0]->id_mapel}}">
    </div>
    <div class="md-form md-outline">
      <input type="date" id="default-picker" name="deadline" class="form-control" placeholder="Select date">
      <label for="default-picker">Deadline Tugas</label>
    </div>
    <button type="submit" class="btn btn-primary">Upload</button>
</form>
@endsection
