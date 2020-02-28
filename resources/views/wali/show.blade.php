@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Tambah Data Wali
                </div>
                <div class="card-body">
                <form action="{{route('wali.show')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Dosen</label>
                        <input type="hidden" name="nama" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Mahasiswa</label>
                        <input type="hidden" name="id_dosen" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                    <select name="" id="">
                    @foreach ($wali as $data)
                        <option value="{{$data->id}}">{{$data->nama}}</option>
                    @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn block">Simpan</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

