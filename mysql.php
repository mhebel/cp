<?php
include "../db.php";
?>
<html>
<body>
<?php
$db = new db();
if (isset($_POST['sql'])) {
  $rs = $db->query(stripslashes($_POST['sql']));
  if(pg_num_rows($rs) < 1){
    echo "No rows for that query";
  }
  else{
    $row = pg_fetch_assoc($rs);
    $keys = array_keys($row);
    echo("<table border='2'>\n  <tr>");
    for($i = 0; $i < count($keys); $i++)
      echo("    <td>$keys[$i]</td>\n");
    echo("  </tr>\n");
    do{
      echo("  <tr>\n");
      for($i = 0; $i < count($keys); $i++)
        echo("    <td>" . $row[$keys[$i]] . "</td>\n");
      echo("  </tr>\n");
    }while($row = pg_fetch_assoc($rs));
    echo("  </tr>\n</table>");
  }
}
?>
<form action="mysql.php" method="post">
<textarea name="sql" rows="10" cols="70"><?php echo(stripslashes($_POST['sql'])) ?></textarea><br><br>
<input type="submit">
</form>
</body>
</html>