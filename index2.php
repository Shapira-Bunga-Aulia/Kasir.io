<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir</title>
    <link rel="stylesheet" href="data.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: white;
        }

        .tampilan {
            text-align: center;
            padding: 20px;
        }

        .kolom {
            margin: 20px auto;
            width: 80%;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden; /* to hide overflowed content */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: cornflowerblue;
            color: white;
        }

        tr:nth-child(even) {
            background-color: silver;
        }

        tr:hover {
            background-color: #ddd;
        }

        button a {
            text-decoration: none;
            color: #fff;
        }

        button {
            background-color: blue;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: flex;
            font-size: 16px;
            margin: 0 auto;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .tombolBack {
            display: flex;
        }


    </style>
</head>
<body>
    <div class="tampilan">
</div>

 <div class="kolom">
            <!-- Kode PHP untuk menampilkan Kasir -->
            <?php
session_start();

$nominalUang = 0;
$kembalian = 0;

if(isset($_SESSION['bayar'])) {
    $nominalUang = $_SESSION['bayar'];
}

if(isset($_SESSION['kembalian'])) {
    $kembalian = $_SESSION['kembalian'];
}

echo "<table border='1px'>";
echo "<tr>";
echo "<th>Produk</th>";
echo "<th>Harga</th>";
echo "<th>Jumlah</th>";
echo "<th>Total</th>";
echo "</tr>";

$totalHarga = 0;
foreach ($_SESSION['kasir'] as $index => $value) {
    echo "<tr>";
    echo "<td>" . $value['produk'] . "</td>";
    echo "<td>" . $value['harga'] . "</td>";
    echo "<td>" . $value['jumlah'] . "</td>";
    echo "<td>" . $value['total'] . "</td>";
    echo "</tr>";

    $totalHarga += $value['total'];
}

echo "<tr>";
echo "<td colspan='3'>total harga</td>";
echo "<td>" . $totalHarga . "</td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan='3'>Nominal Uang</td>";
echo "<td>" . $nominalUang . "</td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan='3'>Kembalian</td>";
echo "<td>" . $kembalian . "</td>";
echo "</tr>";
echo "</table>";
?>
        </div>

        <form action="" method="" class="tombolBack">
        <button type="submit" name="kembali" value="kembali"><a href="index4.php"><i class="fa-solid fa-backward-fast"></i> BACK</a></button>
        <button onclick="window.print()" type="submit" name="hapus" value="hapus"><a href="index3.php"><i class="fa-solid fa-print"></i> CETAK</a></button>
    </form>
</body>
</html>

