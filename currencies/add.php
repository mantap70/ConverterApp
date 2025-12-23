<?php include "../config/database.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mata Uang</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm">
                <div class="card-header bg-success text-white fw-bold">
                    ➕ Tambah Mata Uang
                </div>

                <div class="card-body">
                    <form method="post">

                        <div class="mb-3">
                            <label class="form-label">Kode Mata Uang</label>
                            <input type="text" name="code" class="form-control" placeholder="Contoh: USD" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Mata Uang</label>
                            <input type="text" name="name" class="form-control" placeholder="US Dollar" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Rate ke Base</label>
                            <input type="number" step="0.01" name="rate" class="form-control" placeholder="16674" required>
                            <div class="form-text">
                                Nilai terhadap mata uang dasar (misalnya Rupiah)
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="index.php" class="btn btn-secondary">
                                ⬅ Kembali
                            </a>
                            <button type="submit" class="btn btn-success">
                                💾 Simpan
                            </button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>

</div>

</body>
</html>

<?php
if ($_POST) {
    $code = $_POST['code'];
    $name = $_POST['name'];
    $rate = $_POST['rate'];

    mysqli_query($conn,
        "INSERT INTO currencies (code, name, rate_to_base)
         VALUES ('$code','$name','$rate')"
    );

    header("Location: index.php");
}
?>