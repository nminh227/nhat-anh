  <?php
require_once "header_manage.php"; 
require_once 'functions.php';
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $cat = $_POST['cat'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $series = $_POST['series'];
    $image = "";
    $descrip = $_POST['description'];
//đoạn code dùng để upload & xử lý ảnh
//kiểm tra người dùng đã chọn file ảnh có dung lượng khác 0
if (isset($_FILES['image']) && $_FILES['image']['size'] != 0) {	
    //khai báo biến dùng để lưu file ảnh vào đường dẫn tạm thời
    $temp_name = $_FILES['image']['tmp_name'];
    //khai báo biến dùng để lưu tên của ảnh
    $img_name = $_FILES['image']['name'];
    //tách tên file ảnh dựa vào dấu chấm
    $parts = explode(".", $img_name);
    //tìm index cuối cùng
    $lastIndex = count($parts) - 1;
    //lấy ra extension (đuôi) file ảnh
    $extension = $parts[$lastIndex];
    //thiết lập tên mới cho ảnh
    $image = $name. $extension;
    //thiết lập địa chỉ file ảnh cần di chuyển đến
    $img_url = $_SERVER['DOCUMENT_ROOT'] . "/asm/images/products/";
    $destination = $img_url . $image;
    //di chuyển file ảnh từ đường dẫn tạm thời đến địa chỉ đã thiết lập
    move_uploaded_file($temp_name, $destination);
}
$sql = "INSERT product (cat_id, srs_id, pro_name, price, quantity, image, description)
        VALUES ('$cat', '$series', '$name','$price','$quantity','$image', '$descrip')";
$run = querySQL($sql);
if ($run) { ?>
   <script>
       alert("Add product successfully !");
       window.location.href = "manage_product.php";
   </script>
<?php } }  ?>
<center>
<form style="width: fit-content; margin-top: 30px; height: 750px;" 
      action="" method="POST" enctype="multipart/form-data">
    <fieldset style="margin-top:-100px;">
    <legend>Add product</legend>
    <div class="container">
	<div class="legend_add">
       <div>
		  <form>
             <input type="text" class="legend_text" placeholder="Product name" name="name" maxlength="50" required> 
             <br><br>
              <?php
                 $sql = "SELECT * FROM category";
                 $run = querySQL($sql); ?>
              <select name="cat" style="width:300px; height: 55px; font-family: 'arial', monospace; font-size:15px; margin-right:77px;">
                   <option selected disabled>Category</option>
                   <?php
                   while ($row = mysqli_fetch_array($run)) { ?>
                   <option value='<?= $row['cat_id'] ?>'> <?= $row['cat_name'] ?> </option>
                   <?php } ?>
              </select>
             <br><br>
             <input type="text" class="legend_text" placeholder="Price" name="price" required maxlength="20"> <br><br>
             <input type="number" class="legend_text" placeholder="Quantity" name="quantity" required maxlength="10"> <br><br>
             <?php
                $sql = "SELECT * FROM series";
                $run = querySQL($sql); ?>
              <select name="series" style="width:300px; height: 55px; font-family: 'arial', monospace; font-size:15px; margin-right:77px;">
                  <option selected disabled>Series</option>
                  <?php
                  while ($row = mysqli_fetch_array($run)) { ?>
                  <option value='<?= $row['srs_id'] ?>'> <?= $row['srs_name'] ?> </option>
                  <?php } ?>
              </select>
             <br><br><br>
             <input type="file" name="image" style="font-family: 'inconsolata', monospace; font-size:17px;" required><br><br>
             <input type="text" class="legend_text" placeholder="Description" name="descrip"> <br><br>
             <input type="submit" id="addpro_btn" value="Add" name="add" style="height:37px;width:75px">
          </form> 
       </div>
    </div>
    </fieldset>
</center>
