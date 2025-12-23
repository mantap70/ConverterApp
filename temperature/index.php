<?php include "../config/database.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Skala Suhu</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white fw-bold">
                    🌡️ Data Skala Suhu
                </div>

                <div class="card-body p-0">
                    <table class="table table-striped table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Skala</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        $result = mysqli_query($conn, "SELECT * FROM temperature_scales");
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                    <td>{$no}</td>
                                    <td>{$row['scale_name']}</td>
                                  </tr>";
                            $no++;
                        }
                        ?>
                        </tbody>
                    </table>
                </div>

                <div class="card-footer text-end">
                    <a href="../index.php" class="btn btn-secondary btn-sm">
                        ⬅ Kembali ke Home
                    </a>
                </div>
            </div>

        </div>
    </div>

</div>

</body>
</html>