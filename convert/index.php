<?php include "../config/database.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Konversi</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm">
                <div class="card-header bg-success text-white fw-bold">
                    🔄 Konversi Mata Uang & Suhu
                </div>

                <div class="card-body">
                    <form method="post" action="process.php">

                        <!-- Jenis Konversi -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Jenis Konversi</label>
                            <select name="conversion_type" class="form-select" required>
                                <option value="currency">Mata Uang</option>
                                <option value="temperature">Suhu</option>
                            </select>
                        </div>

                        <!-- Nilai -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nilai</label>
                            <input type="number" step="0.01" name="input_value"
                                   class="form-control" placeholder="Masukkan nilai" required>
                        </div>

                        <!-- Dari -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Dari</label>
                            <select name="from_unit" class="form-select" required>

                                <optgroup label="Mata Uang">
                                    <?php
                                    $curr = mysqli_query($conn, "SELECT * FROM currencies");
                                    while ($c = mysqli_fetch_assoc($curr)) {
                                        echo "<option value='currency_{$c['id']}'>{$c['code']}</option>";
                                    }
                                    ?>
                                </optgroup>

                                <optgroup label="Suhu">
                                    <?php
                                    $temp = mysqli_query($conn, "SELECT * FROM temperature_scales");
                                    while ($t = mysqli_fetch_assoc($temp)) {
                                        echo "<option value='temp_{$t['id']}'>{$t['scale_name']}</option>";
                                    }
                                    ?>
                                </optgroup>

                            </select>
                        </div>

                        <!-- Ke -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Ke</label>
                            <select name="to_unit" class="form-select" required>
                                <?php
                                mysqli_data_seek($curr, 0);
                                while ($c = mysqli_fetch_assoc($curr)) {
                                    echo "<option value='currency_{$c['id']}'>{$c['code']}</option>";
                                }

                                mysqli_data_seek($temp, 0);
                                while ($t = mysqli_fetch_assoc($temp)) {
                                    echo "<option value='temp_{$t['id']}'>{$t['scale_name']}</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <!-- Tombol -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-lg">
                                Konversi
                            </button>
                        </div>

                    </form>
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