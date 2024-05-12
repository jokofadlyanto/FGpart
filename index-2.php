    <?php
    //Koneksi data barang
    $server = "localhost";
    $user = "root";
    $password = "";
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
        <link href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css" rel="stylesheet">
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
                    <table class="table table-stripped table-hover table-bordered" id="tabel-barang">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Part Number</th>
                                <th>Nama Barang</th>
                                <th>Customer</th>
                                <th>Stadart Pack</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $q = "  SELECT * FROM tbbarang";
                            $awaldata = 1;
                            $tampil = mysqli_query($koneksi, $q);
                            while ($data = mysqli_fetch_array($tampil)) :
                            ?>

                                <tr>
                                    <td><?= $awaldata++ ?></td>
                                    <td><?= $data['part_number'] ?></td>
                                    <td><?= $data['nama'] ? $data['nama'] : 'Data Kosong' ?></td>
                                    <td><?= $data['customer'] ?></td>
                                    <td><?= $data['standart_pack'] ?></td>
                                    <td><?= $data['alamat'] ?></td>
                                    <td>
                                        <a href="tampil.php?hal=edit&id=<?= $data['id_barang'] ?>" class="btn btn-warning">Edit</a>
                                        <a href="tampil.php?hal=hapus&id=<?= $data['id_barang'] ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Hapus</a>
                                    </td>
                                </tr>

                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- akhir card -->

        </div>
        <!-- akhir container -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>
        <script>
            $(document).ready(function() {

                var handleShowData = function() {
                    $("#tabel-barang").DataTable();
                }

                handleShowData();
            });
        </script>
    </body>

    </html>