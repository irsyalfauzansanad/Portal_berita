@extends('layouts.app');
@section('content');
<div class="container">
    <div class = "row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    Tabungan Siswa
                    <a href="{{route('tabungan.create')}}" class="float-right">
                        Tambah
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama Siswa</th>
                                <th>Nama Kelas</th>
                                <th>Jumlah Tabungan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach($tabungan as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->siswa->nama}}</td>
                                <td>{{$data->siswa->kelas}}</td>
                                <td>{{$data->jumlah_uang}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection