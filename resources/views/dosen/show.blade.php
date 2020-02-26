@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Tambah Data Dose
                </div>
                <div class="card-body">
                    <div class="form grup">
                        <label for="">Nama Dosen</label>
                    <input type="text" name="nama" value="{{$dosen->nama}}" class="form-control" required>
                        </div>
                        <div class="form grup">
                            <label for="">Nomor Induk Pegawai Dosen</label>
                        <input type="text" name="nipd" value="{{$dosen->nipd}}" class="form-control" required>
                        </div>
                        <div class="form grup">
                        <a href="{{url()->previous()}}" class="bt btn-primary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
