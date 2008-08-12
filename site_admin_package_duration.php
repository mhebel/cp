<?php
require_once("./includes/config.php");

function __autoload($className) {
	require_once BASE_INC . $className . '.php';
}
$db = new pgdb();
$cp_main = new design("ADMIN"); // set up the page
require_once("./includes/adminSecurity.php");
$rs = $db->query("select * from packageduration"); // select the contents from packageduration
$cp_main->toolbar = 0; // no tool bar
$cp_main->site_header("Click & Print: Site Admin","site_duration.js","site_duration.css");
$cp_main->site_left(2);
$cp_main->site_left_end();
$cp_main->site_middle("Click & Print Package Durations");
?>
<form id=admin_packageDurationForm>
<center>
<table id="admin_duration">
  <tr>
   <th>Title</th><th>Cost</th><th>Duration(days)</th><th>Options</th>
  </tr>
<?php
   //loop through all the durations
   $rCount = 1;
   while($row = pg_fetch_assoc($rs)){
   	    echo "<tr>\n";
   		echo "<td id={$rCount}c1>{$row['durationtitle']}</td><td id={$rCount}c2>{$row['cost']}</td><td id={$rCount}c3>{$row['days']}</td><td><span id={$row['packagedurationid']}Edit class=pDurationEdit>[Edit]</span>&nbsp;&nbsp;<span id={$row['packagedurationid']}Delete class=pDurationDel>[Delete]</span></td>";
		echo "\n</tr>";
		$rCount++;
   }
?>
   <tr>
    <td><input name=durationtitle id=editTitle></td><td><input name=cost id=editCost></td><td><input name=duration id=editDays></td><td><input type=button name=newduration value=Submit id=durationButton><input type=hidden id="hiddenAddEdit" name=addEdit value=""></td>
   </tr>
</table>
</center>
</form>
<div id=duration_confirm_del>
</div>
<div id=test>
</div>
<?php
$cp_main->site_footer();
$cp_main->site_end();
?>