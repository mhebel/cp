<?php
require_once("./includes/config.php");

function __autoload($className) {
	require_once BASE_INC . $className . '.php';
}
$db = new pgdb();
$cp_main = new design("ADMIN"); // set up the page
require_once("./includes/adminSecurity.php");
$rs = $db->query("select * from memory"); // select the contents from packageduration
$cp_main->toolbar = 0; // no tool bar
$cp_main->site_header("Click & Print: Site Admin","site_memory.js","site_memory.css");
$cp_main->site_left(2);
$cp_main->site_left_end();
$cp_main->site_middle("Click & Print Package Memory");
?>
<form id=admin_memoryform>
<center>
<table id="admin_memory">
  <tr>
   <th>Title</th><th>Cost</th><th>Size(MBs)</th><th>Options</th>
  </tr>
<?php
   //loop through all the durations
   $rCount = 1;
   while($row = pg_fetch_assoc($rs)){
   	    echo "<tr>\n";
   		echo "<td id={$rCount}c1>{$row['memoryname']}</td><td id={$rCount}c2>{$row['amount']}</td><td id={$rCount}c3>{$row['size']}</td><td><span id={$row['memoryid']}Edit class=pMemoryEdit>[Edit]</span>&nbsp;&nbsp;<span id={$row['memoryid']}Delete class=pMemoryDel>[Delete]</span></td>";
		echo "\n</tr>";
		$rCount++;
   }
?>
   <tr>
    <td><input name=memoryname id=editName></td><td><input name=cost id=editCost></td><td><input name=size id=editSize></td><td><input type=button id=memoryButton name=newmemory value=Submit><input id=hiddenAddEdit type=hidden name=addEdit value=""></td>
   </tr>
</table>
</center>
</form>
<div id=memory_confirm_del>
</div>
<div id=test>
</div>
<?php
$cp_main->site_footer();
$cp_main->site_end();
?>