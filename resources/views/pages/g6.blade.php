@extends('layouts.app')

@section('content')
<section style="padding: 25vh 0px 120px 0px; height: 85vh;">
  <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12" style="text-align: right;">
                <img src="{!! asset('img/logo.png') !!}" width="auto" height="250" style="float: center;">
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="panel panel-primary">
                <form action="{{route('post.g6')}}" method="post">
                  <div class="panel-heading">Apakah Jenis Warna Darah yang Keluar Berwarna Merah Segar?</div>
                      <div class="panel-body">
                      
                        {{csrf_field()}}
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="pilihan" id="inlineRadio1" value="<?= $gejalas[5]['kode_gejala'];  ?>">
                          <label class="form-check-label" for="inlineRadio1">Ya</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="pilihan" id="inlineRadio2" value="tidak">
                          <label class="form-check-label" for="inlineRadio2">Tidak</label>
                        </div>
                      </div>
                    <div class="panel-footer" style="text-align: right;">
                        <button type="submit" name="button" class="btn btn-primary">Lanjut</button>
                    </div>
                    </form>
                </div>
            </div>
    </div>

</section>
@endsection
