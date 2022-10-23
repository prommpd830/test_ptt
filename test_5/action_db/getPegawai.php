<?php

header('Content-Type: application/json; charset=utf-8');

function getAllPegawai()
{
    include 'connDB.php';

    $sql = "SELECT * FROM pegawai";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = [];
        while ($row = $result->fetch_assoc()) {
            array_push($data, $row);
        }
        $response = [
            'success' => true,
            'data' => $data
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'Pegawai not found'
        ];
    }
    $conn->close();

    return $response;
}

function getPegawai($id)
{
    include 'connDB.php';

    $sql = "SELECT * FROM pegawai WHERE id = '{$id}'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();

        $response = [
            'success' => true,
            'data' => $data
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'Pegawai not found'
        ];
    }
    $conn->close();

    return $response;
}


$action = $_GET['action'];

if($action == 'all') {
    $getAllPegawai = getAllPegawai();

    die(json_encode($getAllPegawai));
} elseif ($action == 'get') {
    $id = $_GET['id'];

    $getPegawai = getPegawai($id);

    die(json_encode($getPegawai));
    
}


?>