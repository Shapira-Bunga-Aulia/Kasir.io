<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KASIR</title>
    <link rel="stylesheet" href="data.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .input-group {
            margin-bottom: 10px;
        }
        .input-group label {
            display: inline-block;
            width: 100px; 
            text-align: right;
            margin-right: 10px;
        }
        .input-group input {
            width: 200px; 
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="tampilan">
            <h1 class="judul">Masukan Data Produk</h1>
            <form action="" method="post">
                <div class="input-group">
                    <label for="nama">PRODUK :</label>
                    <input type="text" id="nama" name="produk" class="text">
                </div>
                <div class="input-group">
                    <label for="harga">HARGA :</label>
                    <input type="number" id="harga" name="harga" class="text">
                </div>
                <div class="input-group">
                    <label for="jumlah">JUMLAH :</label>
                    <input type="number" id="jumlah" name="jumlah" class="text">
                </div>
                <button type="submit" name="submit" value="kirim" class="tombol1"><i class="fa-solid fa-plus"></i> TAMBAH</button>
                <button type="submit" name="bayar" value="bayar" class="tombol3"><a href="index4.php"><i class="fa-solid fa-dollar-sign"></i> BAYAR</a></button>
            </form>
        </div>
        <br>

        <div class="kolom">
            <!-- Kode PHP untuk menampilkan KASIR -->
            <?php
                session_start();
                if (!isset ($_SESSION['kasir'])) {
                    $_SESSION['kasir'] = array();
                }

                if (isset ($_POST['produk']) && isset ($_POST['harga']) && isset ($_POST['jumlah'])) {
                    $produk = $_POST['produk'];
                    $harga = $_POST['harga'];
                    $jumlah = $_POST['jumlah'];
                    $total = $harga * $jumlah;
                    $data = array(
                        'produk' => $produk,
                        'harga' => $harga,
                        'jumlah' => $jumlah,
                        'total' => $total
                    );

                    array_push($_SESSION['kasir'], $data);
                }

                // proses penghapusan data
                if(isset($_GET['page'])) {
                    $index = $_GET['page'];
                    unset($_SESSION['kasir'][$index]);
                    // redirect kembali kehalaman ini setelah penghapusan
                    header('Location: http://localhost/SESSION2/KASIR/');
                    exit;
                }

                // var_dump($_SESSION['dataSiswa']);
                
                echo "<table>";
                echo "<tr>";
                echo "<th>Produk</th>";
                echo "<th>Harga</th>";
                echo "<th>Jumlah</th>";
                echo "<th>Total</th>";
                echo "<th>Hapus</th>";
                echo "</tr>";

                $totalHarga = 0;
                foreach ($_SESSION['kasir'] as $index => $value) {
                    if(is_array($value)) {
                    echo "<tr>";
                    echo "<td>" . $value['produk'] . "</td>";
                    echo "<td>" . $value['harga'] . "</td>";
                    echo "<td>" . $value['jumlah'] . "</td>";
                    echo "<td>" . (isset($value['total']) ? $value['total'] : '') . "</td>";
                    echo '<td><a href="?page=' .$index.'">Hapus</a></td>';
                    echo "</tr>";
                }

                $totalHarga += $value['total'];
                }

                echo "<tr>";
                echo "<td colspan='4'>Total Barang</td>";
                echo "<td >". $totalHarga ."</td>";
                echo "</tr>";

                echo "</table>";
            ?>
        </div>
    </div>
</body>
</html>

