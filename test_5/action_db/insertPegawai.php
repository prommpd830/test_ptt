<?php

header('Content-Type: application/json; charset=utf-8');

function insertPegawai($data)
{
    include 'connDB.php';

    $sql = "INSERT INTO pegawai (name, email, gender, nip, hoby, photo) VALUES (\"{$data['name']}\", \"{$data['email']}\", \"{$data['gender']}\", \"{$data['nip']}\", \"{$data['hoby']}\", \"{$data['photo']}\")";

    if ($conn->query($sql) === TRUE) {
        $response = [
            'success' => true,
            'message' => 'New record created successfully'
        ];
    } else {
        $response = [
            'status' => false,
            'message' => 'Error inserting: '. $conn->error
        ];
    }
    $conn->close();

    return $response;
}



// var file upload
$target_dir = "../upload/";
$name_file = time().'-'.basename($_FILES["photo"]["name"]);
$target_file = $target_dir . $name_file;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// get post input
$name = $_POST['name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$nip = $_POST['nip'];
$hoby = $_POST['hoby'];

// Check if image file is a actual image or fake image
$check = getimagesize($_FILES["photo"]["tmp_name"]);
if($check !== false) {

    // Check file size
    if ($_FILES["photo"]["size"] > 1000000) {
        $response = [
            'success' => false,
            'message' => 'Sorry, your file is too large. Max 1MB'
        ];
        die(json_encode($response));
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $response = [
            'success' => false,
            'message' => 'Sorry, only JPG, JPEG, PNG files are allowed'
        ];
        die(json_encode($response));
    }



    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {

        $data = [
            'name' => $name,
            'email' => $email,
            'gender' => $gender,
            'nip' => $nip,
            'hoby' => $hoby,
            'photo' => $name_file
        ];

        $insertPegawai = insertPegawai($data);

        die(json_encode($insertPegawai));
    } else {
        $response = [
            'success' => false,
            'message' => 'Sorry, there was an error uploading your file'
        ];
        die(json_encode($response));
    }
} else {
    $response = [
        'success' => false,
        'message' => 'File is not an image'
    ];
    die(json_encode($response));
}




// die(json_encode([
//     'name' => $_POST['name'],
//     'email' => $_POST['email'],
//     'gender' => $_POST['gender'],
//     'nip' => $_POST['nip'],
//     'hoby' => $_POST['hoby'],
//     'photo' => basename($_FILES['photo']['name'])
// ]));

?>