<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="Page6.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <h2>Lihat Riwayat Pendaftaran</h2>
      <p>Nama Lengkap :</p>
      <div class="table-responsive">          
        <table class="table">
          <thead>
            <tr>
              <th>Id Pendaftaran</th>
              <th>Nomor Periode</th>
              <th>Tahun Periode</th>
              <th>No Kartu Ujian</th>
              <th>Jalur</th>
              <th>Prodi 1</th>
              <th>Prodi 2</th>
              <th>Prodi 3</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><a data-toggle="modal" data-target="#myModal">5678</a></td>
              <td>2</td>
              <td>2017</td>
              <td>KOSONG</td>
              <td>UUI</td>
              <td>S1 Fisika Reguler</td>
              <td>S1 Biologi Reguler</td>
              <td>KOSONG</td>
            </tr>
          </tbody>
        </table>
          <!-- Modal content (diambil dari w3schools)-->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id = 'modaltitle'>Detail Pendaftaran UUI</h4>
            </div>
            <div class="modal-body">
              <form action="index.php" method="post">
                <div class="form-group">
                  <label for="title">Id Pendaftaran : </label>
                  <input type="text" class="form-control" id="update-title" name="title" placeholder="I">
                </div>
                <div class="form-group">
                  <label for="author">Periode : </label>
                  <input type="text" class="form-control" id="update-author" name="author" placeholder="Author's Name">
                </div>
                <div class="form-group">
                  <label for="publisher">Rapot : </label>
                  <input type="text" class="form-control" id="update-publisher" name="publisher" placeholder="Publisher">
                </div>  
                <div class="form-group">
                  <label for="desc">Surat Rekomendasi : </label>
                  <input type="text" class="form-control" id="update-description" name="description" placeholder="Book's Description">
                </div>
                <div class="form-group">
                  <label for="img_path">Asal Sekolah : </label>
                  <input type="img_path" class="form-control" id="update-cover" name="img_path" placeholder="www.example.com">
                </div>
                <div class="form-group">
                  <label for="img_path">Jenis SMA : </label>
                  <input type="img_path" class="form-control" id="update-cover" name="img_path" placeholder="www.example.com">
                </div>
                <div class="form-group">
                  <label for="img_path">Alamat Sekolah : </label>
                  <input type="img_path" class="form-control" id="update-cover" name="img_path" placeholder="www.example.com">
                </div>
                <div class="form-group">
                  <label for="img_path">NISN : </label>
                  <input type="img_path" class="form-control" id="update-cover" name="img_path" placeholder="www.example.com">
                </div>
                <div class="form-group">
                  <label for="img_path">Tanggal Lulus : </label>
                  <input type="img_path" class="form-control" id="update-cover" name="img_path" placeholder="www.example.com">
                </div>
                <div class="form-group">
                  <label for="img_path">Nilai UAN : </label>
                  <input type="img_path" class="form-control" id="update-cover" name="img_path" placeholder="www.example.com">
                </div>
                <div class="form-group">
                  <label for="img_path">Prodi Pilihan 1 : </label>
                  <input type="img_path" class="form-control" id="update-cover" name="img_path" placeholder="www.example.com">
                </div>
                <div class="form-group">
                  <label for="img_path">Prodi Pilihan 2 : </label>
                  <input type="img_path" class="form-control" id="update-cover" name="img_path" placeholder="www.example.com">
                </div>
                <button type="submit" class="btn btn-default btn-default pull-center" data-dismiss="modal">Back</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    <div class="container2" id="pagination">
      <ul class="pagination pagination-sm">
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
      </ul>
  </div>
  </body>
</html>
