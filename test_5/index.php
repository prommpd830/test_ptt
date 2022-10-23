<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">


    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    
    <!-- Datatable -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

    <!-- My CSS -->
    <style>
        #loading-main {
            position: fixed;
            display: block;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            text-align: center;
            background-color: transparent;
            z-index: 100;
        }

        .vertical-center {
            position: absolute;
            margin: auto;
            top: 50%;
            left: 50%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

    </style>
  </head>
  <body>

    <!-- Loading Page -->
    <div class="d-none" id="loading-main">
        <div class="vertical-center">
            <div class="row justify-content-center">
                <div class="col-12 shadow p-5 bg-light">
                    <div class="mb-3">
                        <span class="fw-bold fs-4">Loading</span>
                    </div>
                    <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Loading Page -->

    <!-- Main -->
    <div class="container-fluid py-5">
        <!-- Header -->
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="text-uppercase">Daftar Pegawai</h1>
            </div>
        </div>
        <!-- End Header -->
        <div class="container my-5">
            <!-- Table -->
            <div class="row mb-4">
                <div class="col-12">
                    <a class="btn btn-primary float-end" href="add.php">Tambah Pegawai</a>
                </div>
            </div>
            <div class="table-responsive">
                <table id="table-pegawai" class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Gender</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Hoby</th>
                            <th scope="col" width="200px">Photo</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <!-- End Table -->
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <!-- My JS -->
    <script src="js/index.js"></script>
  </body>
</html>