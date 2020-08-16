<?php
require_once 'header_manage.php';
//kiểm tra người dùng đã bấm nút Add chưa
//nếu đã bấm rồi thực thi câu lệnh SQL
//ngược lại skip code PHP và hiển thị form
if (isset($_POST['add'])) {
$name = $_POST['name'];
$sql = "INSERT INTO category (cat_name) VALUES ('$name')";
$run = querySQL($sql);
if ($run) { ?>
  <script>
      alert("Add category successfully !");
      window.location.href = "manage_category.php";
  </script>
<?php } else { ?>
   <script>
       alert("Add category failed !");
       window.location.href = "manage_category.php";
   </script>
<?php } } ?>
<center>
    <form style="width: fit-content; margin-top: 30px;" 
          action="add_category.php" method="POST">
        <fieldset>
            <legend>Add category</legend>
            <div class="legend_add">
                <div>
		          <form>
			         <input type="text" class="legend_text" placeholder="Category name" name="name" required>
                     <input type="submit" class="legend_btn" value="Add" name="add">
                  </form> 
                </div>
            </div>
        <br><br>
        </fieldset>
    </form>
</center>