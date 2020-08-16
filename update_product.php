<?php 
require_once 'header_manage.php';
$id = $_POST['id'];
$qry = "SELECT * FROM product WHERE pro_id = '$id'";
$result = querySQL($qry);
$row = mysqli_fetch_array($result);
$name = $row['pro_name'];
$cat = $row['cat_id'];
$price = $row['price'];
$quantity = $row['quantity'];
$series = $row['srs_id'];
$image = $row['image'];
$descrip = $row['description'];

if (isset($_POST['update'])) {
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
else { //người dùng không update ảnh => lấy lại ảnh cũ
    $image =  $row['image'];
}
$query12 = "UPDATE product SET cat_id = '$cat', srs_id ='$series', pro_name = '$name', price ='$price', quantity ='$quantity',
          description ='$descrip', image ='$image'
          WHERE pro_id = '$id'";
$result12 = querySQL($query12);
if ($result12) { ?>
  <script>
      alert("Update successfully !");
      window.location.href = "manage_product.php";
  </script>
<?php } else { ?>
    <script>
      alert("Update failed !");
      window.location.href = "manage_product.php";
  </script>
<?php } } ?>
<center>
<form style="width: fit-content; margin-top: 30px;" action="" method="POST" enctype="multipart/form-data">
<fieldset style="margin-top:-100px;">
    <legend>Update product</legend>
    <div class="container">
	<div class="legend_add">
       <div>
		  <form>
             <input type="text" class="legend_text" placeholder="Product name" name="name" maxlength="50" value="<?= $name ?>" required> 
             <br><br>
              <?php
                 $sql = "SELECT * FROM category";
                 $run = querySQL($sql); ?>
              <select name="cat" style="width:300px; height: 55px; font-family: 'arial', monospace; font-size:15px; margin-right:77px;">
                   <option selected disabled>Category</option>
                   <?php
                 while ($row = mysqli_fetch_array($run)) {
                 if ($row['cat_id'] == $cat) { ?>
                 <option value='<?= $cat ?>' selected> <?= $row['cat_name'] ?> </option>
                   <?php } else { ?>
                 <option value='<?= $row['cat_id'] ?>'> <?= $row['cat_name'] ?> </option>
                 <?php } } ?>
              </select>
             <br><br>
             <input type="text" class="legend_text" placeholder="Price" name="price" required maxlength="20" value="<?= $price ?>"> <br><br>
             <input type="number" class="legend_text" placeholder="Quantity" name="quantity" required maxlength="10" value="<?= $quantity ?>">
             <br><br>
             <?php
               $sql = "SELECT * FROM series";
               $run = querySQL($sql); ?>
                <select name="series" style="width:300px; height: 55px; font-family: 'arial', monospace; font-size:15px; margin-right:77px;">
                <option selected disabled>Series</option>
                <?php
                while ($row = mysqli_fetch_array($run)) {
                if ($row['srs_id'] == $series) { ?>
                <option value='<?= $series ?>' selected> <?= $row['srs_name'] ?> </option>
                  <?php } else { ?>
                <option value='<?= $row['srs_id'] ?>'> <?= $row['srs_name'] ?> </option>
             <?php } } ?>
             </select>
             <br><br><br>
             <img src='images\products\<?= $image ?>' width="150" height="150" ><br>
             <input type="file" name="image" style="font-family: 'arial', monospace; font-size:17px;">
             <input type="hidden" name="id" value="<?= $id ?>"> <br><br><br>
             <input type="text" class="legend_text" placeholder="Description" name="descrip" value="<?= $descrip ?>" > <br><br>
             <input type="submit" id="addpro_btn" value="Update" name="update">
          </form> 
       </div>
    </div>
    </fieldset>
</form>
</center>