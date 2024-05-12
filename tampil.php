<?php
    //Koneksi data barang
    $server = "localhost";
    $user = "root";
    $password = "rahasia";
    $database = "dbfgstore";

    //buat koneksi
    $koneksi = mysqli_connect($server, $user, $password, $database) or die(mysqli_error($koneksi));
    
    //Menyimpan data barang
    if(isset($_POST['bsimpan'])) {

        //pengujian apakah data akan di edit atau disimpan baru
        if(isset($_GET['hal']) == "edit") {
            //data akan diedit
            $edit = mysqli_query($koneksi, "UPDATE tbbarang SET
                                            part_number = '$_POST[tpart]',
                                            nama = '$_POST[tnama]',
                                            customer = '$_POST[tcustomer]',
                                            standart_pack = '$_POST[tspack]',
                                            alamat = '$_POST[talamat]'
                                            WHERE id_barang = '$_GET[id]'
                                            ");
        //uji jka data yang teredit sukses
        if($edit) {
            echo "<script>
                          alert('Data berhasil diedit!');
                          document.location='index.php';
            </script>";
        } else {
            echo "<script>
                          alert('Data gagal diedit!');
                          document.location='index.php';
            </script>";
        }
        } else {
        //data akan disimpan baru
        $simpan= mysqli_query($koneksi , " INSERT INTO tbbarang(part_number, nama, customer, standart_pack, alamat)
                                           VALUE ( '$_POST[tpart]',
                                                   '$_POST[tnama]',
                                                   '$_POST[tcustomer]',
                                                   '$_POST[tspack]',
                                                   '$_POST[talamat]'
                                                  )
                                         ");
        }
        //uji jka data yang tersimpan sukses
        if($simpan) {
            echo "<script>
                          alert('Data berhasil disimpan!');
                          document.location='index.php';
            </script>";
        } else {
            echo "<script>
                          alert('Data gagal disimpan!');
                          document.location='index.php';
            </script>";
        }
        }

    //deklarasi barang yang akan menampilkan data barang
    $vpart = "";
    $vnama = "";
    $vcustomer = "";
    $vspack = "";
    $valamat = "";

    //Pengujian jika tombol edit/hapus di klik
    if(isset($_GET['hal'])) {

        //pengujian jika edit data
        if($_GET['hal'] == "edit" ) {

            //tampikan data yang akan di edit
            $tampil = mysqli_query($koneksi, "SELECT * FROM tbbarang WHERE id_barang = '$_GET[id]'" );
            $data = mysqli_fetch_array($tampil);
            if($data) {
                //jika data ditemukan maka data akan ditampung di variabel
                $vpart = $data ['part_number'];
                $vnama = $data ['nama'];
                $vcustomer = $data ['customer'];
                $vspack = $data ['standart_pack'];
                $valamat = $data ['alamat'];
            }
        } else if ($_GET['hal'] == "hapus") {
            //persiapan hapus data
            $hapus = mysqli_query($koneksi, "DELETE FROM tbbarang WHERE id_barang = '$_GET[id]'");
            //uji jika hapus data sukses
            if($hapus) {
                echo "<script>
                              alert('Data berhasil dihapus!');
                              document.location='index.php';
                </script>";
            } else {
                echo "<script>
                              alert('Data gagal dihapus!');
                              document.location='index.php';
                </script>";
            }
        }
    }
    
    ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FG Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>

  <body>
<!-- awal row -->
<div class="row">
            <div class="col-md-8 mx-auto">

        <!-- awal card -->
        <div class="card">
        <div class="card-header bg-info text-light">
        Form Input Data Barang
        </div>
          <div class="card-body">
            <!-- awal form -->
            <form method="POST">

            <div class="mb-3">
            <label class="form-label">Part Number</label>
            <input type="text" name="tpart" value="<?= $vpart ?>" class="form-control" placeholder="Masukkan part number">
            </div>

            <div class="mb-3">
            <label class="form-label">Nama Barang</label>
            <input type="text" name="tnama" value="<?= $vnama ?>" class="form-control" placeholder="Masukkan nama barang">
            </div>

            <div class="mb-3">
            <label class="form-label">Customer</label>
            <input type="text" name="tcustomer" value="<?= $vcustomer ?>" class="form-control" placeholder="Masukkan customer">
            </div>

            <div class="mb-3">
            <label class="form-label">Standart Pack</label>
            <input type="text" name="tspack" value="<?= $vspack ?>" class="form-control" placeholder="Masukkan standard per pack">
            </div>

            <div class="mb-3">
            <label class="form-label">Alamat</label>
            <input type="text" name="talamat" value="<?= $valamat ?>" class="form-control" placeholder="Masukkan alamat barang">
            </div>

            <div class="text-center">
                <hr>
                <button class="btn btn-primary" name="bsimpan" type="submit">Simpan</button>
                <button class="btn btn-danger" name="breset1" type="reset">Reset</button>
            </div>

            </form>
            <!-- akhir form -->
            </div>
        <div class="card-footer bg-info">
        </div>
        </div>
        <!-- akhir card -->

            </div>
        </div>
        <!-- akhir row -->
        </body>
</html>