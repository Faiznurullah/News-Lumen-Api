@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Daftar Artikel') }}</div>
                <div class="card-body">
                
                    @if (session('Pesan'))
                    <div class="alert alert-success" role="alert">
                        {{ session('Pesan') }}.
                     </div>  
                    @endif
                    
                    <div class="table-responsive">
                        <table class="table table-bordered" id="tableBuku" class="table table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Judul</th>
                                    <th>Penulis</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>          
                              @foreach($data as $row)
                                <tr>
                                    <td>{{ $no++; }}</td>
                                    <td>{{ $row->judul }}</td>
                                    <td>{{ $row->penulis }}</td>
                                    <td>
                                    <a href="/detail/{{ $row->id }}" type="button" class="btn btn-info text-white btn-sm mb-3">detail</a>   
                                    <a href="/edit/{{ $row->id }}" type="button" class="btn btn-success btn-sm mb-3">edit</a>
                                    <a href="/hapus/{{ $row->id }}" type="button" class="btn btn-danger text-white btn-sm mb-3">hapus</a>
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
