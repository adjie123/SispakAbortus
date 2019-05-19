@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><center>Usia Kehamilan < 20 Minggu</center></div>

                <div class="card-body">
                  <center>
                    <form action="#" method="post">
                      {{csrf_field()}}
                      
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">1</label>
                      </div>
                      <div class="form-group">
                        <br><center><button type="submit" name="button" class="btn btn-success">Klik</button></center>
                      </div>
                    </form>
                  </center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
