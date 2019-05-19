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
                <div class="card-header">Input penyakit</div>

                <div class="card-body">
                  <form action="{{ route('penyakit.update',  ['id'=>$penyakits->id]) }}" method="post">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="form-group">
                      <label for="kode_penyakit">Kode penyakit</label>
                      <input name="kode_penyakit" class="form-control" type="text" placeholder="Contoh : G01" value="{{$penyakits->kode_penyakit}}" disabled><br>
                      <label for="nama_penyakit">Nama penyakit</label>
                      <input name="nama_penyakit" class="form-control" type="text" placeholder="Nama penyakit" value="{{$penyakits->nama_penyakit}}"><br>
                      <center><button type="submit" name="button" class="btn btn-success">Simpan</button></center>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
