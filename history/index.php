<?php include "../config/database.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Konversi</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="row">
        <div class="col-12">

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white fw-bold">
                    🕘 Riwayat Konversi
                </div>

                <div class="card-body p-0">
                    <table class="table table-bordered table-hover mb-0 align-middle">
                        <thead class="table-light text-center">
                            <tr>
                                <th>No</th>
                                <th>Tipe</th>
                                <th>Input</th>
                                <th>Output</th>
                                <th>Waktu</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        $result = mysqli_query($conn, "SELECT * FROM conversion_history ORDER BY created_at DESC");
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                <td class='text-center'>{$no}</td>
                                <td class='text-center text-capitalize'>{$row['conversion_type']}</td>
                                <td>{$row['input_value']} {$row['input_unit']}</td>
                                <td>{$row['output_value']} {$row['output_unit']}</td>
                                <td class='text-center'>{$row['created_at']}</td>
                                <td class='text-center'>
                                    <a href='delete.php?id={$row['id']}'
                                       class='btn btn-danger btn-sm'
                                       onclick=\"return confirm('Yakin ingin menghapus riwayat ini?')\">
                                       Hapus
                                    </a>
                                </td>
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