<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anagram</title>
</head>
<body>
    <form action="" method="POST">
        <table>
            <tr>
                <td>Masukan String Pertama</td>
                <td>:</td>
                <td><input type="text" name="first_word" placeholder="Contoh : sendok" required></td>
            </tr>
            <tr>
                <td>Masukan String Kedua</td>
                <td>:</td>
                <td><input type="text" name="second_word" placeholder="Contoh : doknes" required></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><input type="submit" name="submit" value="Submit"></td>
            </tr>
        </table>
    </form>

    
    <?php

        function is_anagram($first_word, $second_word)
        {
            if (count_chars($first_word, 1) == count_chars($second_word, 1)) {
                return true;
            } else {
                return false;    
            }
        }

        if (isset($_POST['submit'])) {

            $first_word = $_POST['first_word'];
            $second_word = $_POST['second_word'];

            $anagram = is_anagram($first_word, $second_word);
            
            if($anagram){
                echo 'true';
            }else{
                echo 'false';
            }
        }
    ?>
</body>
</html>