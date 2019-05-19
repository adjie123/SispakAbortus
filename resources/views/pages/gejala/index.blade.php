<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  <title>Tabel Gejala</title>
</head>
<body>
  <div class="col-md-12">
  @if(session('status'))
  <div class="alert alert-success">
  {{session('status')}}
  </div>
  @endif
  </div>
  <div class="container" style="margin-top:20px;">
      <table id="example" class="table table-striped table-bordered" style="width:100%">
        <a href="{{route('gejala.create')}}" class="btn btn-primary" style="margin:10px;">Tambah Gejala</a>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Gejala</th>
                    <th>Nama Gejala</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
              <?php $i=1; ?>
              @foreach($gejalas as $gejala)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$gejala->kode_gejala}}</td>
                    <td>{{$gejala->nama_gejala}}</td>
                    <td>
                      <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                      <a href="{{route('gejala.edit', $gejala)}}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                      <form onsubmit="return confirm('Hapus Item ini?')" class="d-inline"
                        action="{{route('gejala.destroy', $gejala)}}" method="POST">
                       @csrf
                       <input type="hidden" name="_method" value="DELETE">
                       <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                      </form>
                    </td>
                </tr>
              @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th>Kode Gejala</th>
                    <th>Nama Gejala</th>
                </tr>
            </tfoot>
        </table>
  </div>
</body>

<!-- Data Table -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
  } );
</script>
</html>
