<?php
require_once 'header_manage.php';
$id = $_POST['id'];
$qry = "DELETE FROM product WHERE pro_id = '$id'";
$result = querySQL($qry);
if ($result) { ?>
 <script>
     alert ("Delete product successfully !");
     window.location.href = "manage_product.php";
 </script>
<?php } else { ?> 
  <script>
    alert ("Delete product failed !");
    window.location.href = "manage_product.php";
</script>
<?php } 

?>