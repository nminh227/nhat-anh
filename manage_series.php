<?php
require_once 'header_manage.php';
$sql = "SELECT * FROM series";
$result = querySQL($sql);
?>
<center>
<table class='tbl' border=1>
    <tr>
        <th> Series ID </th>
        <th> Series Name </th>
        <th> Options </th>
    </tr>
    <?php
    while ($row = mysqli_fetch_array($result)) {
    $id = $row['srs_id']; //$row[0] (cột 1)
    $name = $row['srs_name']; //$row[1] (cột 2) ?>
    <tr>
        <td> <?= $id ?> </td>
        <td> <?= $name ?> </td>
        <td> 
            <form class='frm_inline' action="update_series.php" method="POST">
                <input type='hidden' name='id' value='<?= $id ?>'>
                <input type='submit' value='Update'>
            </form>
            <form class='frm_inline' action='delete_series.php' method="POST" onsubmit="return confirmDelete();">
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
        var del = confirm("Do you want to delete this series ?");
        if (del)
            return true;
        else
            return false;
    }
</script>