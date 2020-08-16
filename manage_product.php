<?php
require_once 'header_manage.php';

$qry = "SELECT * FROM product";
if (isset($_POST['search'])) {
	$keyword = $_POST['keyword'];
	$qry .= " WHERE pro_name LIKE '%$keyword%'"; 
    $result = querySQL($qry);
   //không tìm thấy kết quả  
   if ($result->num_rows == 0) {  ?>
   <script>
	 alert("Product not found");
	 window.location.href = "";
   </script> 
   <?php } 
}
$result = querySQL($qry);
?>


<center>
<form action="" method="POST">
	<div class="wrap">
      <div class="search">
        <input type="text" class="search_text" placeholder="Search product" name="keyword" required maxlength="30" required>
		<input id="search_btn" type="submit" value="Search" name="search">
      </div>
    </div>
</form>
<br><br>
<table class="tbl" border="1" style="width: 1330px;">
	<tr>
        <th>Category</th>
		<th>Name</th>
		<th>Price</th>
        <th>Quantity</th>
        <th>Series</th>
		<th>Image</th>
        <th>Description</th>
		<th>Options</th>
	</tr>
		<?php 
		while($row = mysqli_fetch_array($result)) {
		?>
		<tr>
            <?php
			//Hiển thị category name thay vì category id
			$qry1 = "SELECT * FROM category";
			$result1 = querySQL($qry1);
			while ($row1 = mysqli_fetch_array($result1)) {
				if ($row1["cat_id"] == $row["cat_id"]) {
					$cat = $row1["cat_name"];
				}
			}
			?>
			<td><?= $cat ?></td>
            </td>
            <td><?php echo $row[3]; ?></td>
            <td><?php echo $row[4]; ?></td>
			<td><?php echo $row[5]; ?></td>
            <?php
			$qry2 = "SELECT * FROM series";
			$result2 = querySQL($qry2);
			while ($row2 = mysqli_fetch_array($result2)) {
				if ($row2["srs_id"] == $row["srs_id"]) {
					$series = $row2["srs_name"];
				}
			}
			?>
			<td><?= $series ?></td>
            </td>
			
			<td> 
			<img src='images\products\<?= $row['image'] ?>' width="150" height="130"></td>
            <td><?php echo $row[7]; ?></td>
			<td> 
			    <form class="frm_inline" action="update_product.php" method="POST">
					<input type="hidden" name="id" value="<?= $row[2] ?>">
					<input type="submit" value="Update">
			    </form>
				<form class="frm_inline" action="delete_product.php" method="POST"
				 onsubmit="return confirmDelete();">
					<input type="hidden" name="id" value="<?= $row[2] ?>">
					<input type="submit" value="Delete">
			    </form>
			</td>
		</tr>
		<?php } ?>
</table>
</center>
<script>
	function confirmDelete() {
		var del = confirm("Do you want to delete this product ?");
		if (del)
			return true;
		else
			return false;
	}
</script>			