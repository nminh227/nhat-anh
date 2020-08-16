<?php
require_once 'header_manage.php';
$id = $_POST['id'];
if (isset($_POST['change'])) {
    $pass = $_POST['pass'];
    $retype = $_POST['retype'];
    if ($pass != $retype) {?> 
        <script>
            alert("Password & retype password don't match");
            window.location.href = "update_pass.php";
        </script>
    <?php } else {
    $token = encryptPassword($pass); // mã hóa pass trước khi lưu vào DB
    $sql = "UPDATE user SET password = '$token' WHERE user_id = '$id'";
    $run = querySQL ($sql);
    if ($run) { ?>
        <script type="text/javascript">
		alert ("Update password successfully !");
		window.location.href = "manage_user.php";
   </script>
    <?php }
    }
}
?>
<center>
    <form style="width: fit-content; margin-top: 30px;" action="update_pass.php" method="POST">
    <fieldset>
        <legend>Change password</legend>
    <div class="legend_add">
          <div>
		     <form>
                <input type="password" class="legend_text" placeholder="Password" name="pass" required style="margin-right:35px;"> <br><br>
                <input type="password" class="legend_text" placeholder="Confirm password" name="retype" required>
                <input type="hidden" name="id" value='<?= $id ?>'>
                <input type="submit" class="legend_btn" value="Change" name="change">
             </form> 
          </div>
       </div>
    </fieldset>
    </form>
</center>


