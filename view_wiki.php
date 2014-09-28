<?php
require 'header.php';
$wiki_id = $_GET['id'];
$result = mysql_query("SELECT * from `basic` WHERE `content_id`=$wiki_id");
$basic_details = mysql_fetch_assoc($result);
?>
<div class="starter-template">
<h2><?php echo $basic_details['content_title'] ?></h2>
</div>
<div class="container">
<?php
	$result = mysql_query("SELECT * FROM `details` WHERE `content_id`=$wiki_id");
	while($details = mysql_fetch_assoc($result)){
		echo '<div class="row">';

		echo '<h3>'.$details['wiki_section_title'].'</h3>';
		echo $details['wiki_section_content'];
		echo '<hr>';
		echo '</div>';
	}
?>
</div>
<?php
require 'footer.php';
?>