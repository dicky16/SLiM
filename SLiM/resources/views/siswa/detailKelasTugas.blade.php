@extends('siswa/detailKelas')
@section('isi')
<div  id="content-detailkelas-01" >
  <div style="text-align: center;">
    <a href="{{ url('siswa/kelas-detail') }}/{{$data[0]->id}}/materi/{{$data[0]->id_mapel}}"><button style="background: #103156;" type="button" class="btn btn-lg text-white">Materi</button></a>
    <a href="{{ url('siswa/kelas-detail') }}/{{$data[0]->id}}/tugas/{{$data[0]->id_mapel}}"><button style="background: #11CDEF;" type="button" class="btn btn-lg text-white">Tugas Kelas</button></a>
  </div>

  <div style="margin: 10px; text-align: center;">

    @foreach($tugas as $t)
    <a href="{{url('siswa/kumpul-tugas/')}}/{{$t->id}}"><button style="background: #11CDEF; border-radius: 20px; margin-top: 10px; width: 600px; padding-top: 10px; padding-bottom:  10px;" type="button" class="btn btn-lg text-white">{{$t->judul_tugas}}</button><br><a/>
    @endforeach

  </div>
</div>
@endsection
