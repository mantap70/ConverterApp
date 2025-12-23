<?php
include "../config/database.php";

$type = $_POST['conversion_type'];
$input_value = $_POST['input_value'];
$from = $_POST['from_unit'];
$to = $_POST['to_unit'];

$output_value = 0;
$input_unit = "";
$output_unit = "";

/* ======================
   KONVERSI MATA UANG
====================== */
if ($type == "currency") {

    $from_id = str_replace("currency_", "", $from);
    $to_id   = str_replace("currency_", "", $to);

    $fromData = mysqli_fetch_assoc(
        mysqli_query($conn, "SELECT * FROM currencies WHERE id=$from_id")
    );

    $toData = mysqli_fetch_assoc(
        mysqli_query($conn, "SELECT * FROM currencies WHERE id=$to_id")
    );

    $output_value = ($input_value * $fromData['rate_to_base']) / $toData['rate_to_base'];

    $input_unit  = $fromData['code'];
    $output_unit = $toData['code'];

    mysqli_query($conn, "
        INSERT INTO conversion_history
        (conversion_type, input_value, input_unit, output_value, output_unit, currency_from_id, currency_to_id)
        VALUES
        ('currency', '$input_value', '$input_unit', '$output_value', '$output_unit', $from_id, $to_id)
    ");
}

/* ======================
   KONVERSI SUHU
====================== */
if ($type == "temperature") {

    $from_id = str_replace("temp_", "", $from);
    $to_id   = str_replace("temp_", "", $to);

    $fromData = mysqli_fetch_assoc(
        mysqli_query($conn, "SELECT * FROM temperature_scales WHERE id=$from_id")
    );

    $toData = mysqli_fetch_assoc(
        mysqli_query($conn, "SELECT * FROM temperature_scales WHERE id=$to_id")
    );

    $input_unit  = $fromData['scale_name'];
    $output_unit = $toData['scale_name'];

    $val = $input_value;

    switch ($input_unit) {
        case "Fahrenheit": $val = ($val - 32) * 5/9; break;
        case "Kelvin": $val = $val - 273.15; break;
        case "Reamur": $val = $val * 5/4; break;
    }

    switch ($output_unit) {
        case "Fahrenheit": $output_value = ($val * 9/5) + 32; break;
        case "Kelvin": $output_value = $val + 273.15; break;
        case "Reamur": $output_value = $val * 4/5; break;
        default: $output_value = $val;
    }

    mysqli_query($conn, "
        INSERT INTO conversion_history
        (conversion_type, input_value, input_unit, output_value, output_unit, temp_from_id, temp_to_id)
        VALUES
        ('temperature', '$input_value', '$input_unit', '$output_value', '$output_unit', $from_id, $to_id)
    ");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Konversi</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm text-center">
                <div class="card-header bg-info text-white fw-bold">
                    ✅ Hasil Konversi
                </div>

                <div class="card-body">
                    <p class="fs-5">
                        <?= number_format($input_value, 2) ?> <?= $input_unit ?>
                        <span class="mx-2">→</span>
                        <strong class="text-success">
                            <?= number_format($output_value, 2) ?> <?= $output_unit ?>
                        </strong>
                    </p>
                </div>

                <div class="card-footer d-flex justify-content-between">
                    <a href="index.php" class="btn btn-primary">
                        🔄 Konversi Lagi
                    </a>
                    <a href="../history/index.php" class="btn btn-secondary">
                        📜 Lihat Riwayat
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>