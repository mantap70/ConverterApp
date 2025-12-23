<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Converter App</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Optional custom CSS -->
    <link rel="stylesheet" href="assets/style.css">
</head>
<body class="bg-light">

<div class="container vh-100 d-flex align-items-center justify-content-center">
    <div class="card shadow-lg p-4" style="width: 420px;">
        
        <h2 class="text-center mb-4 fw-bold">Aplikasi Konversi</h2>

        <div class="d-grid gap-3">
            <a href="currencies/index.php" class="btn btn-primary btn-lg">
                Data Mata Uang
            </a>

            <a href="temperature/index.php" class="btn btn-warning btn-lg text-white">
                Data Skala Suhu
            </a>

            <a href="history/index.php" class="btn btn-secondary btn-lg">
                Riwayat Konversi
            </a>

            <a href="convert/index.php" class="btn btn-success btn-lg">
                Konversi
            </a>
        </div>

    </div>
</div>

</body>
</html>