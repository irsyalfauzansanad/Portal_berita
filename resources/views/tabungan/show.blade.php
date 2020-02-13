@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Tabungan</div>
                <div class="badge-dark">
                <div class="card-body">
                        @csrf
                        <div class="form-group">
                            <div class="col-md-4">
                                <label for="">Pilih nama siswa</label>
                            </div>
                            <div class="col-md-8">
                                <select name="siswa_id" class= "form-control" readonly>
                                    <option value="{{$tabungan->id}}" >{{$tabungan->siswa->nama}} - {{$tabungan->siswa->kelas}} </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                <label for="">Masukan Jumlah Uang</label>
                            </div>
                            <div class="col-md-8">
                                <input type="number" value="{{$tabungan->jumlah_uang}}" name="jumlah_uang" readonly class="form-control" required>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
