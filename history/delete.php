<?php
include "../config/database.php";
$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM conversion_history WHERE id=$id");
header("Location: index.php");
