<?php

header('Content-Type: application/json; charset=utf-8');

function deletePegawai($id)
{
    include 'connDB.php';

    $sql = "DELETE FROM pegawai WHERE id = {$id}";
    $result = $conn->query($sql);

    if ($result) {
        $response = [
            'success' => true,
            'message' => 'Data deleted successfully'
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'Something error :'. $conn->error
        ];
    }
    $conn->close();

    return $response;
}

if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $deletePegawai = deletePegawai($id);

    die(json_encode($deletePegawai));
}


?>