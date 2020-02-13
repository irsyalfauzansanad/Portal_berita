@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <div class="card">
            
                <div class="card-header">Data Siswa
                <a href = "{{ route('siswa.create')}}" class="btn btn-primary float-right">Tambah siswa</a>
                </div><br>
    
                <div class="card-body">
                    
                   
                    <table class="table">
                        <thead>
                            <th>Nama siswa</th>
                            <th>Kelas</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td> {{$item->nama}}  </td>
                                <td> {{$item->kelas}} </td>
                                <td> 
                                    <form action = "{{route('siswa.destroy', $item->id)}}" method="post">
                                        @csrf
                                        @method('Delete')
                                        <a class ="btn btn-outline-info" href= "{{ route('siswa.show', $item->id)}}"> Lihat </a>
                                        <a class ="btn btn-outline-warning" href= "{{ route('siswa.edit', $item->id)}}"> Edit </a>
                                        <button class ="btn btn-outline-danger" type="submit">Delete</button>
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
@endsection
