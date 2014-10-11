<?php
require 'header.php';
if(isset($user)) {
	if((strpos($email, 'aiesec.net') !== false)){


?>




<div class="container">
	<h2 class="text-center">Welcome to the myaiesec.net Wiki Archives</h2>
	<h4 class="text-center"><a href="list.php">Access them here >></a></h4>
</div>

<?php
	} else {
		echo '<h2>Log in with your myaiesec.net email address';
	}
}
require 'footer.php';
?>