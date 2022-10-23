<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelipatan</title>
</head>
<body>
    <form action="" method="POST">
        <table>
            <tr>
                <td>Masukkan Nilai</td>
                <td>:</td>
                <td><input type="text" name="nilai" placeholder="Masukkan Nilai" required></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><input type="submit" name="submit" value="TAMPILKAN"></td>
            </tr>
        </table>
    </form>

    
    <?php
        if (isset($_POST['submit'])) {
            $nilai = $_POST['nilai'];

            for ($i= 1; $i <= $nilai; $i++) { 
                if ($i % 6 == 0) {
                    echo $i .' DIGITAL OASIS '.'<br/>';
                } elseif ($i % 3 == 0) {
                    echo $i .' OS '.'<br/>';
                } elseif ($i % 2 == 0) {
                    echo $i .' DI '.'<br/>';
                } else {
                    echo $i .'<br/>';
                }
            }

        }
    ?>
</body>
</html>