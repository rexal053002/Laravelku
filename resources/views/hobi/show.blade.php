@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    data Hobi
                </div>
                <div class="card-body">
                    <div class="form-group">
                            <label for="">Hobi Mahasiswa</label>
                            <input type="text" name="hobi" value="{{$hobi->hobi}}" class="form-control" readonly>
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
