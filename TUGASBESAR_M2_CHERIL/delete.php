<?php
include 'connect.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM lembaga_penyalur WHERE id = $id");

header("Location: index.php");
exit();
?>