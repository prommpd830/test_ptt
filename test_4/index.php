<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Split Number</title>
</head>
<body>
    <form action="" method="POST">
        <table>
            <tr>
                <td>Masukkan Nilai (Contoh : 1.225.441)</td>
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

            // remove '.' in string
            $string = str_replace('.', '', $nilai);

            // string to array
            $array_string = str_split($string);
            // count lenght array
            $array_lenght = count($array_string);

            echo "<p>Input : $nilai</p>";
            echo "<p>Output :</p>";

            foreach ($array_string as $key => $value) {
                $zero_number = '';
                $minus_lenght = (int)$key + 2;
                $zero_lenght = (int)$array_lenght - (int)$minus_lenght;
                for ($i=0; $i <= $zero_lenght ; $i++) { 
                    $zero_number .= '0';
                }

                echo $value.$zero_number .'<br/>';
            }

        }
    ?>
</body>
</html>

