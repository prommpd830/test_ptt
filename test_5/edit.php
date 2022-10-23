<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Pegawai</title>
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
                <h1 class="text-uppercase">Edit Pegawai</h1>
            </div>
        </div>
        <!-- End Header -->
        <div class="container my-5">
            <!-- Form -->
            <div class="row justify-content-center">
                <div class="col-md-10 col-12 shadow p-5">
                    <form id="form-edit-pegawai" action="action_db/editPegawai.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="form-floating mb-3">
                                    <input type="name" class="form-control" id="floatingName" placeholder="Name" name="name" required>
                                    <label for="floatingName">Name</label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingEmail" placeholder="Email" name="email" required>
                                    <label for="floatingEmail">Email</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-12">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingGender" name="gender" required>
                                        <option value="Laki - laki">Laki - Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    <label for="floatingGender">Gender</label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="floatingNIP" placeholder="NIP" name="nip" required>
                                    <label for="floatingNIP">NIP</label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="floatingHoby" name="hoby" required>
                                        <option value="Sepak Bola">Sepak Bola</option>
                                        <option value="Voli">Voli</option>
                                        <option value="Tenis Meja">Tenis Meja</option>
                                    </select>
                                    <label for="floatingHoby">Hoby</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                            <div class="mb-3">
                                <label for="formPhoto" class="form-label">Photo</label>
                                <input class="form-control" type="file" id="formPhoto" name="photo">
                                <div class="row justify-content-center mt-3">
                                    <div class="col-md-5 col-12">
                                        <img id="img-preview" class="img-fluid img-thumbnail" src="" alt="" srcset="">
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="d-flex gap-2">
                            <a class="btn btn-danger w-100" href="index.php">Kembali</a>
                            <button class="btn btn-primary w-100" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Form -->
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <!-- My JS -->
    <script src="js/edit.js"></script>
  </body>
</html>