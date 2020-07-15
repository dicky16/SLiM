@extends('guru/kelasDetail')
@section('isi')
<div  id="content-detailkelas-01" >
  <div style="text-align: center;">
    <a href="{{ url('guru/kelas-detail') }}/{{$data[0]->id}}/materi/{{$data[0]->id_mapel}}"><button style="background: #103156;" type="button" class="btn btn-lg text-white">Materi</button></a>
    <a href="{{ url('guru/kelas-detail') }}/{{$data[0]->id}}/tugas/{{$data[0]->id_mapel}}"><button style="background: #11CDEF;" type="button" class="btn btn-lg text-white">Tugas Kelas</button></a>
  </div>
  <div style="text-align: center; margin-top: 30px;">
    <a href="{{ url('guru/kelas-detail') }}/{{$data[0]->id}}/materi-tambah"><button style="background: orange;" type="button" class="btn btn-lg text-white">Upload Materi</button></a>
  </div>
  <div style="margin: 40px; text-align: center;">
    @foreach($materi as $m)
    <a href="{{ url('assets/user/materi/')}}/{{$m->file_path}}"><button style="background: #103156; border-radius: 20px; margin-top: 10px; width: 600px; padding-top: 10px; padding-bottom:  10px;" type="button" class="btn btn-lg text-white">{{$m->judul_materi}}</button><br><a/>
    <!-- <button style="background: #103156;" id="btn-tugas" type="button" class="btn text-white">Bahasa Indonesia.pdf</button><br>
    <button style="background: #103156;" id="btn-tugas" type="button" class="btn text-white">Bahasa Indonesia.pdf</button><br>
    <button style="background: #103156;" id="btn-tugas" type="button" class="btn text-white">Bahasa Indonesia.pdf</button><br>
    <button style="background: #103156;" id="btn-tugas" type="button" class="btn text-white">Bahasa Indonesia.pdf</button><br> -->
    @endforeach
  </div>
</div>
@endsection
