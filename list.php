<?php
require 'header.php';

//Get Parameters
if(isset($_GET['committee']) && !empty($_GET['committee'])){
	$committee = $_GET['committee'];
} else {
	$committee = 'unset';
}

if(isset($_GET['search']) && !empty($_GET['search'])){
	$search = $_GET['search'];
} else {
	$search = 'unset';
}

if(isset($_GET['page']) && !empty($_GET['page'])){
	$page = $_GET['page'];
	$offset = $page * 20;
} else {
	$page = 'unset';
	$offset = 0;
}

$where_query = "";
//Process Parameters
if($committee != 'unset'){
	$where_query .= " AND `committee_id`=$committee";
}

if($search != 'unset'){
	$where_query .= " AND `content_title` LIKE '%$search%'";
}

?>
<div class="container">
	<br>
	<div class="row">
		<div class="col-md-8">
			<form class="form-inline" role="form">
			  <div class="form-group">
			    <input type="text" class="form-control" placeholder="Enter Terms" id="search_bar" size="100" name="search" value="<?php if($search != 'unset') {echo $search;}  ?>">
			  	<input type="hidden" value="<?php if($committee != 'unset') {echo $committee;} ?>">
			  	<input type="hidden" value="<?php if($page != 'unset') {echo $page;} ?>">
			  </div>
			  <button type="submit" class="btn btn-default">Search</button>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2">
			<span class="text-left">Previous Page</span>
		</div>
		<div class="col-md-2 col-md-offset-8 text-right">
			<span class="text-right">Next Page</span>
		</div>
		
		
	</div>
	<table class="table table-striped">
		<tr>
			<td>Wiki Name</td>
			<td>Committee</td>
			<td>Date</td>
		</tr>
<?php
echo $query = "SELECT * from `basic` WHERE 1 ".$where_query." ORDER BY `last_updated_date` DESC LIMIT $offset, 20";
$result = mysql_query($query);

while($row = mysql_fetch_assoc($result)){
	echo '<tr>';
	echo '<td><a href="view_wiki.php?id='.$row['content_id'].'">'.$row['content_title'].'</a></td>';
	echo '<td><a href="index.php?committee='.$row['committee_id'].'">'.get_committee($row['committee_id']).'</a></td>';
	echo '<td>'.$row['last_updated_date_display'].'</td>';
	echo '</tr>';
}
?>
	</table>
		<div class="row">
		<div class="col-md-2">
			<span class="text-left">Previous Page</span>
		</div>
		<div class="col-md-2 col-md-offset-8 text-right">
			<span class="text-right">Next Page</span>
		</div>
		
		
	</div>
</div>
<?php
require 'footer.php';
?>