@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ini halaman siswa</div>
                <div class="badge-dark">
                <div class="card-body">
                    <form action=" {{ route('siswa.store') }} " method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="col-md-4">
                                <label for="">Masukan nama siswa</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                <label for="">Masukan Kelas</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="kelas" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <button class="btn btn-primary" type="submit">simpan</button>
                            <button class="btn btn-primary" type="reset">reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
