<?php
require_once 'header_manage.php';

if (isset($_POST['add'])) {
$name = $_POST['name'];
$sql = "INSERT INTO series (srs_name) VALUES ('$name')";
$run = querySQL($sql);
if ($run) { ?>
  <script>
      alert("Add series successfully !");
      window.location.href = "manage_series.php";
  </script>
<?php } else { ?>
   <script>
       alert("Add series failed !");
       window.location.href = "manage_series.php";
   </script>
<?php } } ?>

<center>
    <form style="width: fit-content; margin-top: 30px;" 
          action="add_series.php" method="POST">
        <fieldset>
            <legend>Add series</legend>
            <div class="legend_add">
                <div>
		          <form>
			         <input type="text" class="legend_text" placeholder="Series name" name="name" required>
                     <input type="submit" class="legend_btn" value="Add" name="add">
                  </form> 
                </div>
            </div>
        <br><br>
        </fieldset>
    </form>
</center>

