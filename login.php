<?php
require_once("design.php");
draw_head("Click and Print - Home");
draw_middle();
draw_content_header("Login");
?>
<p>
  Please log into your click and print dental account.
</p>
<center>
<table id="loginForm">
 <tr><td></td><td align=right><a href="">New User</a></td></tr>
 <tr><td style="color:#ee0000;font-weight:bold;padding-left:8px;">User Name:</td><td><input></td></tr>
 <tr><td style="color:#ee0000;font-weight:bold;padding-left:8px;">Password:</td><td><input></td></tr>
 <tr><td colspan=2 align=center><input type=submit value=Login name=login>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=Clear></td></tr>
 <tr><td colspan=2><a href="">Recover Password</a></td></tr>
</table>
</center>
<?php
draw_footer();
draw_end();
?>