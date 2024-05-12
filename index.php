    <?php
    //Koneksi data barang
    $server = "localhost";
    $user = "root";
    $password = "rahasia";
    $database = "dbfgstore";

    //buat koneksi
    $koneksi = mysqli_connect($server, $user, $password, $database) or die(mysqli_error($koneksi));
    session_start();
    
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
    <!-- awal container -->
    <div class="container">
        <h3 class="text-center">Data Alamat Barang</h3>
        <h3 class="text-center">Finish Goods</h3>
        

        <!-- awal card -->
        <div class="card mt-3">
        <div class="card-header bg-info text-light">
        Data Barang
        </div>
          <div class="card-body">
            <div class="col-md-8">
                <form method="POST">
                <div class="input-group mb-3">
                    <input type="text" name="tcari" value="<?= @$_POST['tcari']?>" class="form-control" placeholder="Masukkan kata kunci.">
                    <button class="btn btn-primary" type="submit" name="bcari">Cari</button>
                    <button class="btn btn-danger" type="reset" name="breset2">Reset</button>
                </div>
                <a href="tampil.php" class="btn btn-warning" >Tambah Barang</a>
                </form>
                
            </div>
            <div class="mt-3"></div>
            
            <table class="table table-stripped table-hover table-bordered">
                <tr>
                    <th>No</th>
                    <th>Part Number</th>
                    <th>Nama Barang</th>
                    <th>Customer</th>
                    <th>Stadart Pack</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>

                <?php
                //persiapan menampilkan barang
                

                //Untuk pencarian data
                //jika tombol cari di klik
                if(isset($_POST['bcari'])) {
                    //tampilkan data yang akan di cari
                    $keyword = $_POST['tcari'];
                    $_SESSION['tcari'] = $keyword;
                    $q = "SELECT * FROM tbbarang WHERE part_number LIKE '%$keyword%' OR customer LIKE '%$keyword%' OR 
                    alamat LIKE '%$keyword%' ORDER BY id_barang desc";
                } else {
                    $keyword = $_SESSION['tcari'];
                    $jumlahdataperhalaman = 5;
                    $b = mysqli_query($koneksi, "SELECT * FROM tbbarang");
                    $jumlahdata = mysqli_num_rows($b);
                    $jumlahhalaman = ceil($jumlahdata/$jumlahdataperhalaman);
                    $halamanaktif = (isset($_GET['halaman']) ? $_GET['halaman'] : 1);
                    $awaldata = ($jumlahdataperhalaman * $halamanaktif) - $jumlahdataperhalaman;

                    $jumlahlink = 3;
                    if($halamanaktif > $jumlahlink) {
                        $startnumber = $halamanaktif - $jumlahlink;
                    } else {
                        $startnumber = 1;
                    }

                    if($halamanaktif < ($jumlahhalaman - $jumlahlink)) {
                        $endnumber = $halamanaktif + $jumlahlink;
                    } else {
                        $endnumber = $jumlahhalaman;
                    }

                    $q = "SELECT * FROM tbbarang order by id_barang desc limit $awaldata, $jumlahdataperhalaman";
                }

                $tampil = mysqli_query($koneksi, $q );
                while ($data = mysqli_fetch_array($tampil)) :

                ?>
                
                <tr>
                    <td><?= $awaldata += 1?></td>
                    <td><?= $data['part_number']?></td>
                    <td><?= $data['nama']?></td>
                    <td><?= $data['customer']?></td>
                    <td><?= $data['standart_pack']?></td>
                    <td><?= $data['alamat']?></td>
                    <td>
                        <a href="tampil.php?hal=edit&id=<?= $data['id_barang']?>" class="btn btn-warning">Edit</a>
                        <a href="tampil.php?hal=hapus&id=<?= $data['id_barang']?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
                
                <?php endwhile; ?>
            </table>
            
            <div class="mt-2 justify-content-end d-flex">
                            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php if ($halamanaktif > 1 ) :?>    
                    <li class="page-item">
                    <a class="page-link" href="?halaman=<?= $halamanaktif - 1?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                    </li>
                    <?php endif ;?>

                    <?php for ($i = $startnumber; $i<= $endnumber; $i++) :?>
                    <?php if ($i == $halamanaktif) :?>
                        <li class="page-item active"><a class="page-link" href="?halaman=<?= $i ;?>"><?= $i ;?></a></li>
                    <?php else :?>
                        <li class="page-item"><a class="page-link" href="?halaman=<?= $i;?>"><?= $i;?></a></li>
                    <?php endif ;?>
                    <?php endfor;?>
                    
                    <?php if ($halamanaktif < $jumlahhalaman ) :?>
                    <li class="page-item">
                    <a class="page-link" href="?halaman=<?= $halamanaktif + 1?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                    </li>
                    <?php endif;?>
                </ul>
                </nav>
            </div>
        </div>
        <div class="card-footer bg-info">
        </div>
        </div>
        <!-- akhir card -->
       
    </div>
    <!-- akhir container -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>