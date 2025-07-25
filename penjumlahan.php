<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Penjumlahan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
            margin: 0;
        }
        .calculator {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        input {
            margin: 5px;
            padding: 10px;
            width: 90%;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: white;
            cursor: pointer;
            border: none;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        .result {
            margin-top: 10px;
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>

<div class="calculator">
    <h2>Penjumlahan Sederhana</h2>
    <form method="POST">
        <input type="number" name="number1" placeholder="Masukkan angka pertama" required>
        <input type="number" name="number2" placeholder="Masukkan angka kedua" required>
        <input type="submit" value="Hitung">
    </form>

    <div class="result">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Cek apakah input ada dan valid
            $number1 = isset($_POST['number1']) ? (int)$_POST['number1'] : 0;
            $number2 = isset($_POST['number2']) ? (int)$_POST['number2'] : 0;

            // Pastikan input benar-benar angka
            if (is_numeric($number1) && is_numeric($number2)) {
                $result = $number1 + $number2;
                echo "Hasil: $number1 + $number2 = $result";
            } else {
                echo "Masukkan angka yang valid!";
            }
        }
        ?>
    </div>
</div>

</body>
</html>