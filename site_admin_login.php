<?php
require_once("./includes/config.php");

function __autoload($className) {
	require_once BASE_INC . $className . '.php';
}
$db = new pgdb();
$cp_main = new design("ADMIN"); // set up the page
$msg = "";

//logout
if(isset($_GET['logout'])){

    	$_SESSION['adminid'] = "";
    	$_SESSION['adminUserName'] = "";
    	header("Location:".BASE_URL."site_admin_login.php");
    	exit();

}

//check login information
if(isset($_POST['loginButton'])){
	$rs = $db->query("select siteadminid,username from siteadmin where username = ". $db->esc($_POST['user']) ." and password = " . $db->esc($_POST['pass']).";");
    $row = pg_fetch_assoc($rs);
    if($row['siteadminid'] != ''){

    	$_SESSION['adminid'] = $row['siteadminid'];
    	$_SESSION['adminUserName'] = $row['username'];
 		header("Location:".BASE_URL."site_admin_setup.php");
 		exit();
    }else{
    	header("Location:".BASE_URL."site_admin_login.php?fail");
 		exit();
    }

}
$cp_main->toolbar = 0; // no tool bar
$cp_main->site_header("Click And Print: Site Admin","admin_login.js","site_login.css");
$cp_main->site_left(2);
$cp_main->site_left_end();
$cp_main->site_middle("Click And Print Package Admin Login");
echo $msg;
?>
<center>
<form id="login" name="admin_loginForm" action="site_admin_login.php" method=post>
<table id="admin_loginBox">
  <tr>
    <td>User:</td><td><input name="user"/></td>
  </tr>
  <tr>
    <td>Password:</td><td><input type="password" name="pass"/></td>
  </tr>
  <tr>
   <td colspan="2" align="center"><input type="submit" value="Submit" name="loginButton" id="loginButton"/></td>
  </tr>
</table>
</form>
</center>
<div id="test">
</div>
<?php
$cp_main->site_footer();
$cp_main->site_end();
?>