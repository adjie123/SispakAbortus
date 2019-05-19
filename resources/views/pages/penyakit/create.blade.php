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
                <div class="card-header">Input Penyakit</div>

                <div class="card-body">
                  <form action="{{route('penyakit.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                      <label for="kode_penyakit">Kode Penyakit</label>
                      <input name="kode_penyakit" class="form-control" type="text" placeholder="Contoh : P01"><br>
                      <label for="nama_penyakit">Nama Penyakit</label>
                      <input name="nama_penyakit" class="form-control" type="text" placeholder="Nama penyakit"><br>
                      <center><button type="submit" name="button" class="btn btn-success">Simpan</button></center>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
