<?php

header('Content-Type: application/json; charset=utf-8');

// die(json_encode([
//     'name' => $_POST['name'],
//     'email' => $_POST['email'],
//     'gender' => $_POST['gender'],
//     'nip' => $_POST['nip'],
//     'hoby' => $_POST['hoby'],
//     'photo' => $_FILES['photo']
// ]));


function editPegawai($data)
{
    include 'connDB.php';

    if(array_key_exists('photo', $data)) {
        $sql = "UPDATE pegawai SET name =\"{$data['name']}\", email = \"{$data['email']}\", gender = \"{$data['gender']}\", nip = \"{$data['nip']}\", hoby = \"{$data['hoby']}\", photo = \"{$data['photo']}\" WHERE id = \"{$data['id']}\"";
    } else {
        $sql = "UPDATE pegawai SET name =\"{$data['name']}\", email = \"{$data['email']}\", gender = \"{$data['gender']}\", nip = \"{$data['nip']}\", hoby = \"{$data['hoby']}\" WHERE id = \"{$data['id']}\"";
    }

    if ($conn->query($sql) === TRUE) {
        $response = [
            'success' => true,
            'id' => $data['id'],
            'message' => 'Data record Updated successfully'
        ];
    } else {
        $response = [
            'status' => false,
            'message' => 'Error updating: '. $conn->error
        ];
    }
    $conn->close();

    return $response;
}

// get post input
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$nip = $_POST['nip'];
$hoby = $_POST['hoby'];


if($_FILES['photo']['tmp_name'] === ''){
    $data = [
        'id' => $id,
        'name' => $name,
        'email' => $email,
        'gender' => $gender,
        'nip' => $nip,
        'hoby' => $hoby
    ];

    $editPegawai = editPegawai($data);

    die(json_encode($editPegawai));
} else {
    // var file upload
    $target_dir = "../upload/";
    $name_file = time().'-'.basename($_FILES["photo"]["name"]);
    $target_file = $target_dir . $name_file;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

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
                'id' => $id,
                'name' => $name,
                'email' => $email,
                'gender' => $gender,
                'nip' => $nip,
                'hoby' => $hoby,
                'photo' => $name_file
            ];

            $editPegawai = editPegawai($data);

            die(json_encode($editPegawai));
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
}






?>