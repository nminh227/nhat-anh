<?php
require_once 'header_manage.php';

$id = $_POST['id'];
if (isset($_POST['update'])) {
$name = $_POST['name'];
$sql = "UPDATE series SET srs_name = '$name' WHERE srs_id = '$id'";
$run = querySQL($sql);
if ($run) { ?>
   <script type="text/javascript">
		alert ("Update series successfully !");
		window.location.href = "manage_series.php";
   </script>
<?php 
} else { ?>
  <script type="text/javascript">
		alert ("Update series failed !");
		window.location.href = "manage_series.php";
  </script>
<?php } } ?>
<center>
<form style="width: fit-content; margin-top: 30px;" action="" method="POST">
	<fieldset>
	<legend>Update series</legend>
	<?php
	$qry = "SELECT * FROM series WHERE srs_id = '$id'";
	$result = querySQL($qry);
	$cls = mysqli_fetch_array($result);
	?>
       <div class="legend_add">
          <div>
		     <form>
                <input type="hidden" name="id" value="<?= $cls[0] ?>"> 
			    <input type="text" class="legend_text" placeholder="Series name" value="<?= $cls[1] ?>" size="30" name="name">
                <input type="submit" class="legend_btn" value="Update" name="update">
             </form> 
          </div>
       </div>
    </fieldset>
</form>
</center>