<?php
require_once 'header_manage.php';
$sql = "SELECT * FROM category";
$result = querySQL($sql);
?>
<center>
<table class='tbl' border=1>
    <tr>
        <th> Category ID </th>
        <th> Category Name </th>
        <th> Options </th>
    </tr>
    <?php
    while ($row = mysqli_fetch_array($result)) {
    $id = $row['cat_id']; 
    $name = $row['cat_name'];?>
    <tr>
        <td> <?= $id ?> </td>
        <td> <?= $name ?> </td>
        <td> 
            <form class='frm_inline' action="update_category.php" method="POST">
                <input type='hidden' name='id' value='<?= $id ?>'>
                <input type='submit' value='Update'>
            </form>
            <form class='frm_inline' action='delete_category.php' method="POST" onsubmit="return confirmDelete();">
                <input type='hidden' name='id' value='<?= $id ?>'>
                <input type='submit' value='Delete'>
            </form>
        </td>
    </tr>
    <?php } ?>
</table>
</center>
<script>
    function confirmDelele() {
        var del = confirm("Do you want to delete this category ?");
        if (del)
            return true;
        else
            return false;
    }
</script>