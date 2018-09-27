<?php

require_once '../scripts/database_connect.php';

include_once 'header.php';
include_once 'navigation.php';


if(count($_POST)>0) {
	$sql = "UPDATE users set user_login='" . $_POST["user_login"] .  "', user_name='" . $_POST["user_name"] . "', user_surname='" . $_POST["user_surname"] . "' WHERE user_id='" . $_POST["userId"] . "'";
	mysqli_query($connection,$sql);
	$message = "Record Modified Successfully";
}
$select_query = "SELECT * FROM users WHERE user_id='" . $_GET["userId"] . "'";
$result = mysqli_query($connection,$select_query);
$row = mysqli_fetch_array($result);

?>

<main>
    <form name="frmUser" method="post" action="">
<div style="width:500px;">
<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
<div align="right" style="padding-bottom:5px;"><a href="index.php" class="link"><img alt='List' title='List' src='images/list.png' width='15px' height='15px'/> List User</a></div>
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
<tr class="tableheader">
<td colspan="2">Edit User</td>
</tr>
<tr>
<td><label>Username</label></td>
<td><input type="hidden" name="userId" class="txtField" value="<?php echo $row['user_id']; ?>">
    <input type="text" name="user_login" class="txtField" value="<?php echo $row['user_login']; ?>"></td>
</tr>

<td><label>First Name</label></td>
<td><input type="text" name="user_name" class="txtField" value="<?php echo $row['user_name']; ?>"></td>
</tr>
<td><label>Last Name</label></td>
<td><input type="text" name="user_surname" class="txtField" value="<?php echo $row['user_surname']; ?>"></td>
</tr>
<tr>
<td colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
</tr>
</table>
</div>
</form>
</main>

<?php include_once 'footer.php'; ?>