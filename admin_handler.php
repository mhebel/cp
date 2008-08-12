<?php
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past

require_once("./includes/config.php");
//require_once("./includes/adminSecurity.php");

function __autoload($className) {
	require_once BASE_INC . $className . '.php';
}
$db = new pgdb();
if(isset($_POST['pagetype'])){

	switch ($_POST['pagetype']) {
	case "packageduration":
		if(isset($_POST['del'])){
			$db->execute("delete from packageduration where packagedurationid = " . $db->esc($_POST['del']));
			break;
		}
		isset($_POST['packagedurationid']) ? $durationId = $_POST['packagedurationid'] : $durationId = -1;
	    $db->spsingle("sp_packageduration",array($durationId,$_POST['durationTitle'],$_POST['cost'],$_POST['days']));
	    break;
	case "memory":
		if(isset($_POST['del'])){
			$db->execute("delete from memory where memoryid = " . $db->esc($_POST['del']));
			break;
		}
		isset($_POST['memoryid']) ? $memoryId = $_POST['memoryid'] : $memoryId = -1;
	    $db->spsingle("sp_memory",array($memoryId,$_POST['memoryname'],$_POST['size'],$_POST['cost']));
	    break;
	case "somethingesle":
	    echo "i equals 2";
	    break;
}

}
?>

