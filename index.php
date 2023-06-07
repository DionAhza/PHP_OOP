<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <center>
        <form action="" method="post">
           
            <h3>NIS</h3>
            <input type="text" name="nis">

            <h3>Matematika</h3>
            <input type="text" name="mtk">

            <h3>Prod</h3>
            <input type="text" name="prod">

            <h3>Pipas</h3>
            <input type="text" name="pipas">

            <h3>Sejarah</h3>
            <input type="text" name="sejarah">

            <h3>Agama</h3>
            <input type="text" name="agama">

            <h3>B.indo</h3>
            <input type="text" name="bindo">
            <br><br>
            <input type="submit" name="submit">
            <hr>
        </form>
    </center>
</body>

</html>

<?php
class FormHandler
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function handleSubmit()
    {
        if (isset($_POST['submit'])) {
            $nis = $_POST['nis'];
            $mtk = $_POST['mtk'];
            $prod = $_POST['prod'];
            $pipas = $_POST['pipas'];
            $sejarah = $_POST['sejarah'];
            $agama = $_POST['agama'];
            $bindo = $_POST['bindo'];

            $sql = "INSERT INTO `hitung`(`nis`,`mtk`, `prod`, `pipas`, `sejarah`, `agama`, `bindo`) VALUES ('$nis','$mtk','$prod','$pipas','$sejarah','$agama','$bindo')";
            $apakah = mysqli_query($this->conn, $sql);

            if ($apakah) {
                echo "Berhasil ditambahkan";
            } else {
                echo "Gagal";
                exit;
            }

            $data = array($mtk, $prod, $pipas, $sejarah, $agama, $bindo);

    
            $totalSemua = array_sum($data);
            echo "Jumlah total angka: " . $totalSemua . "<br>";


            $total1 = array_sum($data);
            $jumlahData = count($data);
            $rataRata = $total1 / $jumlahData;
            echo "Jumlah rata rata: " . $rataRata . "<br>";


            $maksimum = max($data);
            echo "Nilai maksimum: " . $maksimum . "<br>";

           
            $minimum = min($data);
            echo "Nilai minimum: " . $minimum . "<br>";

          
            if ($totalSemua >= 540) {
                echo "A";
            } elseif ($totalSemua >= 480) {
                echo "B";
            } elseif ($totalSemua >= 420) {
                echo "C";
            } else {
                echo "D";
            }
            echo "<br>";
        }
    }
}

include "koneksi.php";
$formHandler = new FormHandler($conn);
$formHandler->handleSubmit();
?>
<html><a class="a" href="tampil.php">tampil</a></html>
