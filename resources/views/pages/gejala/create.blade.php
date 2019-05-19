@extends('layouts.app')

@section('content')
<div class="col-md-12">
@if(session('status'))
<div class="alert alert-success">
{{session('status')}}
</div>
@endif
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Input Gejala</div>

                <div class="card-body">
                  <form action="{{route('gejala.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                      <label for="kode_gejala">Kode Gejala</label>
                      <input name="kode_gejala" class="form-control" type="text" placeholder="Contoh : G01"><br>
                      <label for="nama_gejala">Nama Gejala</label>
                      <input name="nama_gejala" class="form-control" type="text" placeholder="Nama Gejala"><br>
                      <center><button type="submit" name="button" class="btn btn-success">Simpan</button></center>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
