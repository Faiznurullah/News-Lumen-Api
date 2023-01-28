@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Daftar Artikel') }}</div>
                <div class="card-body">
                
                    <div class="table-responsive">
                        <table class="table table-bordered" id="tableBuku" class="table table-bordered" width="100%">
                            <thead>
                                <tr>
                                    <th colspan="2"><p class="text-center">Data Artikel</p></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td width="30%">
                                        <p>Judul</p>
                                    </td>
                                    <td>
                                        {{ $data->judul }}
                                    </td>
                                </tr>
                                <tr>
                                    <td width="30%">
                                        <p>Penulis</p>
                                    </td>
                                    <td>
                                        {{ $data->penulis }}
                                    </td>
                                </tr>
                                <tr>
                                    <td width="30%">
                                        <p>Konten</p>
                                    </td>
                                    <td>
                                        {{ $data->content }}
                                    </td>
                                </tr>
                                <tr>
                                    <td width="30%">
                                        
                                    </td>
                                    <td>
                                        <a href="/daftar" class="btn btn-success btn-sm">kembali</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
