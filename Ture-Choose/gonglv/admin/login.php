<?php
require '../config.php';
$adminname = $_POST['adminname'];
$adminpass = $_POST['adminpass'];
$adminsql = "select * from xwmi_admin where adminname='$adminname' and adminpass='$adminpass'";
$adminery = mysql_query($adminsql, $config);
$adminnum = mysql_num_rows($adminery);
if ($adminnum == "1") {
setcookie("admin", "Y", time() + 3600*24, '/');
setcookie("admin_name", $adminname, time() + 3600*24, '/');
header("location:admin.php");
} else {
header("location:index.php");
}
?>