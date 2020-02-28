@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                @if(session('message'))
                    <div class="alert alert-success" role="alert">
                        {{session('message')}}
                    </div>
                @endif
                <div class="card-header">
                    Data Mahasiswa
                <a href="{{route('wali.create')}}" class="float-right btn btn-primary">
                    Tambah Data</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Nama Wali</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no=1; @endphp
                                @foreach ($wali as $data)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$data->nama}}</td>
                                        <td>{{$data->mahasiswa->nama}}</td>
                                        <td>
                                            <form action="{{route('wali.destroy', $data->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                                <a href="{{route('wali.show',$data->id)}}" class="btn btn-warning">Lihat</a> |
                                                <a href="{{route('wali.edit', $data->id)}}" class="btn btn-success">Edit</a> |
                                                <button type="sumbit" onclick="return confirm('Apakah Anda Yakin ?')" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
