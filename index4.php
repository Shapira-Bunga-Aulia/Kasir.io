<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .box {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 25px;
            max-width: 500px;
            margin: 10% auto;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
        }

        .input-group input {
            width: 100%;
            padding: 8px 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-left: 92px;
        }

        button:hover {
            background-color: #0056b3;
        }

        a {
            text-decoration: none;
            color: white;
        }

        p {
            text-align: center;
        }

    </style>
</head>
<body>
<div class="box">
        <div class="tampilanbox">
            <form action="" method="post">
                <div class="input-group">
                    <label for="bayar"><i class="fa-solid fa-circle-dollar-to-slot"></i> BAYAR :</label>
                    <input type="number" id="bayar" name="bayar" >
                </div>
                <button type="submit"><i class="fa-solid fa-basket-shopping" id="checkout" name="checkout"></i> Checkout</button>
                <button type="submit"><a href="index.php"><i class="fa-solid fa-backward"></i> Kembali</a></button>
                <!-- <button type="submit"><a href="index2.php"><i class="fa-solid fa-basket-shopping"></i> Checkout</a></button> -->
            </form>
        </div>
    
    <?php
    session_start();
    if(isset($_SESSION['kasir'])) {
        $totalBelanjaan = 0;

        foreach($_SESSION['kasir'] as $item) {
            if(isset($item['total'])) {
                $totalBelanjaan += $item['total'];
            }
        }

        echo "<p>"."Total uang yang harus dibayarkan ". "Rp ". number_format($totalBelanjaan, 0, ",", "."). "</p>";
        echo "<br>";
    }  

    if(isset($_POST['bayar'])) {
        $bayar = $_POST['bayar'];

        if($bayar >= $totalBelanjaan) {
            $kembalian = $bayar - $totalBelanjaan;
            $_SESSION['bayar'] = $bayar;
            $_SESSION['kembalian'] = $kembalian;
            header('Location: index2.php');
            exit;
        }else {
            echo "<p>Uang tidak cukup!</p>";
        }
    }

    ?>
    </div>
</body>
</html>