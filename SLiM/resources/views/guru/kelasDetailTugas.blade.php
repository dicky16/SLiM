@extends('guru/kelasDetail')
@section('isi')
<div  id="content-detailkelas-01" >
  <div style="text-align: center;">
    <a href="materi"><button style="background: #103156;" type="button" class="btn btn-lg text-white">Materi</button></a>
    <a href="tugas"><button style="background: #11CDEF;" type="button" class="btn btn-lg text-white">Tugas Kelas</button></a>
  </div>
  <div style="text-align: center; margin-top: 30px;">
    <a href="tugas-tambah"><button style="background: orange;" type="button" class="btn btn-lg text-white">Upload Tugas</button></a>
  </div>
  <div style="margin: 10px; text-align: center;">
    <button id="btn-tugas" type="button" class="btn text-white bold">Tugas Kelas</button><br>
    <button id="btn-tugas" type="button" class="btn text-white">Tugas Kelas</button><br>
    <button id="btn-tugas" type="button" class="btn text-white">Tugas Kelas</button><br>
    <button id="btn-tugas" type="button" class="btn text-white">Tugas Kelas</button><br>
    <button id="btn-tugas" type="button" class="btn text-white">Tugas Kelas</button><br>
  </div>
</div>
@endsection
