<?php
// File CSV untuk menyimpan data
$file = 'data.csv';

// Cek jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $nim = $_POST['nim'] ?? '';
    $nama = $_POST['nama'] ?? '';
    $jenis_kelamin = $_POST['jenis_kelamin'] ?? '';
    $alamat = $_POST['alamat'] ?? '';
    $no_hp = $_POST['no_hp'] ?? '';
    $email = $_POST['email'] ?? '';

    // Data untuk ditulis ke file CSV
    $data = [$nim, $nama, $jenis_kelamin, $alamat, $no_hp, $email];

    // Tambahkan data ke file CSV
    $handle = fopen($file, 'a'); // Mode append
    fputcsv($handle, $data);
    fclose($handle);

    // Redirect untuk mencegah resubmission
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="card m-5">
        <h3 class="card-title mt-3 d-flex justify-content-center">Form Input Data</h3>
        <div class="card-body m-3">
            <form method="POST" action="">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="nim">NIM</label><br>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" id="nim" name="nim" required><br><br>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="nama">Nama</label><br>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" id="nama" name="nama" required><br><br>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="jenis_kelamin">Jenis Kelamin</label><br>
                    <div class="col-sm-10">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="pria" name="jenis_kelamin" value="Pria" required>
                            <label class="form-check-label" for="pria">Pria</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="wanita" name="jenis_kelamin" value="Wanita" required>
                            <label class="form-check-label" for="Wanita">Wanita</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="alamat">Alamat</label><br>
                    <div class="col-sm-10">
                        <input class="form-control" type="address" id="alamat" name="alamat" required><br><br>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="no_hp">No HP</label><br>
                    <div class="col-sm-10">
                        <input class="form-control" type="phone" id="no_hp" name="no_hp" required><br><br>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="email">Email</label><br>
                    <div class="col-sm-10">
                        <input class="form-control" type="email" id="email" name="email" required><br><br>
                    </div>
                </div>
        
                <button onclick="window.location.href='data.csv'" class="btn btn-success">Download File CSV</button>
                <!-- <a href="data.csv" download="data.csv">Download File CSV</a> -->
            </form>
        </div>
    </div>
</body>
</html>
