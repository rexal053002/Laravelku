@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Tambah Data Mahasiswa
                </div>
                <div class="card-body">
                <form action="{{route('mahasiswa.show')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Mahasiswa</label>
                        <input type="hidden" name="nama" value="{{$mhs->nama}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">NIM</label>
                        <input type="hidden" name="nim" value="{{$nim->nim}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Dosen</label>
                        <input type="hidden" name="id_dosen" value="{{$mhs->nama}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                    <select name="" id="">
                    @foreach ($dosen as $data)
                        <option value="{{$data->id}}">{{$data->nama}}</option>
                    @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                        <a href="{{url()->previous()}}" class="bt btn-primary">Kembali</a>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
