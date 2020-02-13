@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Tabungan</div>
                <div class="badge-dark">
                <div class="card-body">
                    <form action=" {{ route('tabungan.update', $tabungan->id) }} " method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <div class="col-md-4">
                                <label for="">Pilih nama siswa</label>
                            </div>
                            <div class="col-md-8">
                                <select name="siswa_id" class= "form-control">
                                    @foreach ($siswa as $item)
                                        <option value="{{$item->id}}" {{ $item->id == $tabungan->siswa_id ? 'selected' : '' }}>{{$item->nama}} - {{$item->kelas}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                <label for="">Masukan Jumlah Uang</label>
                            </div>
                            <div class="col-md-8">
                                <input type="number" name="jumlah_uang" value="{{$tabungan->jumlah_uang}}" class="form-control" required>
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
