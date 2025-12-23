<?php include "../config/database.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mata Uang</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <!-- Judul -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">💱 Data Mata Uang</h2>
        <a href="add.php" class="btn btn-success">
            ➕ Tambah Mata Uang
        </a>
    </div>

    <!-- Tabel -->
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover text-center mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Rate to Base</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $result = mysqli_query($conn, "SELECT * FROM currencies");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['code']}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['rate_to_base']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr>
                            <td colspan='3'>Data mata uang belum tersedia</td>
                          </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tombol kembali -->
    <div class="mt-4">
        <a href="../index.php" class="btn btn-secondary">
            ⬅ Kembali ke Home
        </a>
    </div>

</div>

</body>
</html>