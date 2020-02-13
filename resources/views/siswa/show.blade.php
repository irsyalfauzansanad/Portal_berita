@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ini halaman siswa</div>
                <div class="badge-dark">
                <div class="card-body">
                    <div class="table-responsive">
                            <div class="col-md-4">
                                <label for="">nama siswa</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" value="{{$siswa->nama}}" readonly name="nama" class="form-control" required>
                            </div>
                        </div>
                            <div class="col-md-4">
                                <label for="">Masukan Kelas</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" value="{{$siswa->kelas}}" readonly name="kelas" class="form-control" required>
                            </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
