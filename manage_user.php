<?php
require_once('header_manage.php');
require_once 'functions.php';

$qry = "SELECT * FROM user";
$result = querySQL($qry);
?>
<center>
<table class="tbl" border="1">
    <!-- tạo các cột tiêu đề của bảng -->
    <tr>    
        <th> User ID </th>
        <th> Username </th>
        <th> Password </th>
        <th> Options </th>
    </tr>
    <?php
    //hiển thị dữ liệu từ database vào bảng
    while($row = mysqli_fetch_array($result)) {     
        echo "<tr>";
            echo '<td>' . $row["user_id"] . '</td>'; //in cột User ID (0)
            echo '<td>' . $row["username"] . '</td>'; //in cột Username (1)
            echo '<td>' . $row[2] . '</td>'; //in cột Username (2)
        ?>  
        <!-- tạo cột Options để chứa 2 nút Update & Delete -->  
        <td>
            <form class="frm_inline" action="update_pass.php" method="POST">
                <input type="hidden" name="id" value='<?= $row["user_id"] ?>'>
                <input type="submit" value="Change password">
            </form>
            <form class="frm_inline" action="delete_user.php" method="POST" onsubmit="return confirmDelete();">
                <input type="hidden" name="id" value='<?= $row["user_id"] ?>'>
                <input type="submit" value="Delete">
            </form>
        </td>
        </tr>
    <?php } ?>
</table>
</center>
<!-- tạo hàm để hiển thị xác nhận trước khi xóa -->
<script>
    function confirmDelete () {
        var del = confirm("Do you want to delete this user ?");
        if (del)
            return true;
        else
            return false;
    }
</script>