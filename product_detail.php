<?php
require_once 'header_customer.php';
require_once 'functions.php';
?>

<!DOCTYPE HTML>
<html>

<head>
  <title>Cactus Jack</title>
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" href="css/indexpro.css?verson=3">
  <link rel="stylesheet" href="css/table.css?verson=3">
</head>

<body>
  <div id="main">
      <div class="content">
      <?php
      if (isset($_GET['ProID'])) {
      $ProID = $_GET['ProID'];
      $sql1 = "SELECT * FROM product WHERE pro_id = '$ProID'";
      $rst1 = querySQL($sql1);
      while ($std = mysqli_fetch_array($rst1)) { ?>
      <center>
        <div class="std_detail1">
            <center>
          <div class="std_info1">
            <img src='images\products\<?= $std['image']?>' width="300" height="250"> 
          </div> <br>
            </center>
          <div class="std_info2">
           <table>
               <tr>
                   <th>Product details</th>
                   <th>Description</th>
               </tr>
            <tr>
            <td style="width:300px;">
            Name: <?= $std['pro_name'] ?> <br> <br>
            Price: <?= $std['price'] ?> <br> <br>
            Quantity: <?= $std['quantity'] ?> <br> <br>
            <?php
            $scategory = $std['cat_id'];
            $sql2 = "SELECT cat_name FROM category WHERE cat_id = '$scategory'";
            $rst2 = querySQL($sql2);
            $category = mysqli_fetch_array($rst2); ?>
            Category: <?= $category[0] ?> <br> <br>

            <?php
            $aseries = $std['srs_id'];
            $sql3 = "SELECT srs_name FROM series WHERE srs_id = '$aseries'";
            $rst3 = querySQL($sql3);
            $series = mysqli_fetch_array($rst3); ?>
            Series: <?= $series[0] ?> <br> <br>
            </td>
            <td style="width:300px;"><?= $std['description'] ?></td>
            </tr>
           </table>
          </div>     
        </div>
      <?php } } 
      ?>
      </div>
    </div>
    </center>
    <div class="footerwrap">
      <div class="footer">
        <div class="footercontent">
        Curated by Cactus Jack 2020
        </div>
      </div>
    </div>
</body>
</html>
