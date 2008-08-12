<?php
require_once("./includes/config.php");

function __autoload($className) {
	require_once BASE_INC . $className . '.php';
}

$cp_main = new design();
$cp_main->toolbar = 0;
$cp_main->site_header("Click & Print: Site Admin","","site.css");
$cp_main->site_left(2);
$cp_main->site_left_end();
$cp_main->site_middle("Click & Print Setup Options");
?>
<center>
<table id=adminSiteOption>
  <tr>
   <td valign=top>
    <h4>Package Setup</h4>
    <ul>
      <li><a href="site_admin_package_duration.php">Package Duration</a></li>
      <li><a href="site_admin_package_memory.php">Package Memory</a></li>
      <li><a href="site_admin_new_package.php">Create New Package</a></li>
    </ul>
   </td>
   <td valign=top>
    <h4>Site Sections</h4>
    <ul>
      <li>Main Menu [X]</li>
      <li>Graphic Forms [X]</li>
      <li>Text Forms[X]</li>
      <li>Click & Show[X]</li>
      <li>Movies[X]</li>
      <li>Add</li>
    </ul>
   </td>
   <td valign=top>
    <h4>Site Categories</h4>
    <ul>
      <li>Oral Surgery[X]</li>
      <li>Prosthodontics[X]</li>
      <li>Preventative[X]</li>
      <li>Add</li>
    </ul>
   </td>
  </tr>
  <tr>
   <td valign=top>
    <h4>Site Page Types</h4>
    <ul>
      <li>Movie[X]</li>
      <li>Graphic form[X]</li>
      <li>Text Form[X]</li>
      <li>Add</li>
    </ul>
   </td>
   <td valign=top>
    <h4>Site Media Types</h4>
    <ul>
      <li>Movie</li>
      <li>Form</li>
      <li>Image</li>
      <li>Add</li>
    </ul>
   </td>
   <td valign=top></td>
  </tr>
  <tr>
   <td valign=top></td>
   <td valign=top></td>
   <td valign=top></td>
  </tr>
</table>
</center>
<?php
$cp_main->site_footer();
$cp_main->site_end();
?>