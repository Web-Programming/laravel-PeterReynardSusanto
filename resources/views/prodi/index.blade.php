@extends('layout.master')
@section('title', 'Halaman Prodi')

@section('content')
<div class ="row pt-4">
    <div class="col">
</div>
<h2>Prodi</h2>
<div class ="d-md-flex justify-content-md-end"></div>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Nama Prodi</th>
            <th>Aksi</th>
        </tr>
    </thead>
<tbody>
    @foreach ($prodis as $item)
    <tr>
        <td> {{ $item->nama }} </td>
        <td>
            <a href="{{ url('prodi/'.$item->id) }}" class="btn btn-warning">Detail</a>
            <a href="{{ url('prodi/'.$item->id.'/edit') }}" class="btn btn-info">Ubah</a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
</div>
</div>
@endsection
