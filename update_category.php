<?php
require_once 'header_manage.php';

$id = $_POST['id'];
if (isset($_POST['update'])) {
$name = $_POST['name'];
$sql = "UPDATE category SET cat_name = '$name' WHERE cat_id = '$id'";
$run = querySQL($sql);
if ($run) { ?>
   <script type="text/javascript">
		alert ("Update category successfully !");
		window.location.href = "manage_category.php";
   </script>
<?php 
} else { ?>
  <script type="text/javascript">
		alert ("Update category failed !");
		window.location.href = "manage_category.php";
  </script>
<?php } } ?>
<center>
<form style="width: fit-content; margin-top: 30px;" action="" method="POST">
	<fieldset>
	<legend>Update category</legend>
	<?php
	$qry = "SELECT * FROM category WHERE cat_id = '$id'";
	$result = querySQL($qry);
	$cls = mysqli_fetch_array($result);
	?>
       <div class="legend_add">
          <div>
		     <form>
                <input type="hidden" name="id" value="<?= $cls[0] ?>"> 
			    <input type="text" class="legend_text" placeholder="Category name" value="<?= $cls[1] ?>" size="30" name="name">
                <input type="submit" class="legend_btn" value="Update" name="update">
             </form> 
          </div>
       </div>
    </fieldset>
</form>
</center>