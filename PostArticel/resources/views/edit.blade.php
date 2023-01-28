@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Edit Artikel') }}</div>

                <div class="card-body">
                   
           <form action="/update/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                @csrf

   <div class="row">

       <div class="col-md-6">
        <label for="exampleFormControlInput1" class="form-label">Nama Judul:</label>
        <input type="text" value="{{ $data->judul }}" class="form-control  @error('judul') is-invalid @enderror is-valid" name="judul" id="exampleFormControlInput1" placeholder="Nama Judul">
        <div class="valid-feedback">
          @error('judul')
<div class="alert alert-danger">{{ $message }}</div>
       @enderror
        </div>
       </div>

       <div class="col-md-6">
        <label for="exampleFormControlInput1" class="form-label">Nama Penulis:</label>
        <input type="text" value="{{ $data->penulis }}" class="form-control  @error('penulis') is-invalid @enderror is-valid" name="penulis" id="exampleFormControlInput1" placeholder="Nama Penulis">
        <div class="valid-feedback">
          @error('penulis')
<div class="alert alert-danger">{{ $message }}</div>
       @enderror
        </div>
       </div>

   </div>

   <div class="row">

   <div class="col-md-6">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Konten</label>
             <textarea class="form-control  @error('content') is-invalid @enderror is-valid"  id="exampleFormControllTextarea1" name="content"></textarea>
        </div>
        <div class="valid-feedback">
            @error('content')
       <div class="alert alert-danger">{{ $message }}</div>
         @enderror
          </div>
       </div>
   </div>

     <div class="col-md-6">
        <div class="d-grid gap-2 mt-4">
            <button class="btn btn-success" type="submit">Kirim Data</button>
          </div>
       </div>

      </div>
   </div>

            </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
