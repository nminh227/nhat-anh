<?php
require_once 'header_manage.php';
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql1 = "SELECT * FROM product WHERE srs_id = '$id'";
    $run1 = querySQL($sql1);
    if ($run1->num_rows > 0) { ?>
        <script>
        alert("Delete series failed !");
        window.location.href = "manage_series.php";
    </script>
    <?php 
    } else {
    //xóa sau khi đã kiểm tra điều kiện
    $sql2 = "DELETE FROM series WHERE srs_id = '$id'";
    $run2 = querySQL($sql2); ?>
        <script>
            alert("Delete series successfully !");
            window.location.href = "manage_series.php";
        </script>
    <?php } 
} 
?>